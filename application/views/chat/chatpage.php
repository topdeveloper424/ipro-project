
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content" >            
            <div class="spinner-feeds" style="text-align: center; margin-top: 200px;"><i class="fa fa-spinner fa-spin fa-3x"></i></div>
            <div class="error-feeds alert alert-danger" style="display:none;margin: 0px;">Sorry seems like we are having some problems displaying the chat!!!</div> 
            <div class="portlet-body col-md-6" id="chats" style="display: none;">
                <div class="scroller" style="height: 400px;" data-always-visible="1" data-rail-visible1="1">
                   <ul class="chat_block_lists chats">
                   </ul>
                </div>    
                <div class="chat-form">
                    <div class="input-cont">
                        <input class="form-control" id="msg_box" type="text" placeholder="Type a message here..." /> </div>
                    <div class="btn-cont">
                        <span class="arrow"> </span>
                        <a href="javascript:;" id="msg_send" class="btn blue icn-only">
                            <i class="fa fa-check icon-white"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- END : ECHARTS -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->   
 
    <!-- END QUICK SIDEBAR -->
</div>
 <script src="<?= base_url() ?>assets/global/scripts/moment.min.js"></script>
<script src="<?php echo $socket_url ?>/socket.io/socket.io.js"></script>
<script>
    $ = jQuery;
    var user_id='<?php echo $userdata['id'] ?>';
    var room_id=1;
    var cont = $("#chats");
    var chat_block_list = $('.chat_block_lists', cont);
    if(typeof io=="undefined")
    {
        $('.spinner-feeds').hide();
        cont.hide();
        $('.error-feeds').show();
    }
    else
    {
        var socket = io.connect('<?php echo $socket_url ?>');

        var scroll_func = function (){            
            var getLastPostPos = function() {                
                var height = 0;
                cont.find("li.out, li.in").each(function() {                    
                    height = height + $(this).outerHeight();
                });

                return height;
            }

            cont.find('.scroller').slimScroll({
                scrollTo: getLastPostPos(),
            });
        }

        var chatpage=socket.of('/chatpage')
            .on('connect_failed', function (reason) {
            $('.spinner-feeds').hide();
            cont.hide();
            $('.error-feeds').show();
            console.error('unable to connect chatpage to namespace', reason);
            })
            .on('error',function(reason){
            //alert("in error func");
            $('.spinner-feeds').hide();
            cont.hide();
            $('.error-feeds').show();
            cont.html('');
            console.error('unable to connect chatpage to namespace', reason);
            })
            .on('reconnect_failed',function(){
            alert("in reconnect fail func");
            $('.spinner-feeds').hide();
            cont.hide();
            $('.error-feeds').show();
            cont.html('');
            })
            .on('connect', function () {
            console.info('sucessfully established a connection of chatpage with the namespace');
            chatpage.emit('senddata',{user_id:user_id,room_id:room_id});
            });
        
        chatpage.on('chatdata',function(data){
            $('.error-feeds').hide();
            $('.spinner-feeds').hide();
            chat_block_list.html('');
            cont.show();
            var header='';
            var content='';
            var footer='';
            
            var cells='';
            
            if(data.memdata)
            {
                for(n in data.memdata)
                {
                    cells+='<span class="label label-default"><input type="hidden" class="userId" value="'+data.memdata[n].user_id+'"/>'+data.memdata[n].username+'</span>&nbsp;';
                }
            }
            header='<div class="panel-heading"><h3 class="panel-title"><span class="label label-success">Online:</span> <span id="online-list"> '+cells+'</span></h3></div>';
            cont.append(header);            
           
            if(data.converdata)
            {
                for(n in data.converdata)
                {   
                    var avatar = data.converdata[n].avatar;

                    if(!avatar){
                        avatar = 'assets/uploads/default.png';
                    }   
                    var chat_comment = '<li class="in">'+
                            '<img class="avatar" alt="" src="../'+avatar+'" />'+
                            '<div class="message">'+
                                '<span class="arrow"> </span>'+
                                '<a href="javascript:;" class="name">'+data.converdata[n].username+'</a>'+
                                '<span class="datetime"> at 20:54 </span>'+
                                '<span class="body">'+data.converdata[n].comment+'</span>'+
                            '</div>'+
                        '</li>';
                    chat_block_list.append(chat_comment);
                }
            }
            else
            {
                chat_block_list.append('');
            }   
            scroll_func();        
        }); 
        chatpage.on('showcomment',function(data){
            var avatar = data.room_comment[0].avatar;
            
            if(!avatar){
                avatar = 'assets/uploads/default.png';
            }  

            var in_out = "in";
            if(user_id == data.room_comment[0].user_id){
                in_out = "out"
            }
            var chat_comment = '<li class="'+in_out+'">'+
                            '<img class="avatar" alt="" src="../'+avatar+'" />'+
                            '<div class="message">'+
                                '<span class="arrow"> </span>'+
                                '<a href="javascript:;" class="name">'+data.room_comment[0].username+'</a>'+
                                '<span class="datetime"> at 20:54 </span>'+
                                '<span class="body">'+data.room_comment[0].comment+'</span>'+
                            '</div>'+
                        '</li>';
            chat_block_list.append(chat_comment);
            $('#msg_box').val('');
            scroll_func();
        });
        chatpage.on('newuser',function(data){
            $('#online-list').append('<span class="label label-default"><input type="hidden" class="userId" value="'+data.userdata[0].user_id+'"/>'+data.userdata[0].username+'</span>&nbsp;') 
        });
        chatpage.on('removeuser',function(data){
            $('#online-list span').each(function(index){
                var user_id=$(this).find('.userId').val();
                if(user_id==data.user_id)
                {
                    $(this).remove();
                }
            }); 
        });
        $('body').on("keypress",'#msg_box', function(e) {   
        if (e.which == 13) {
            $(this).blur();
            var message = $(this).val();
            if(message)
            {
                sendChat(message);
            }
            $(this).focus();
            return false; // prevent the button click from happening
        }
        }); 
        $('body').on("click",'#msg_send', function(e) { 
            var message = $('#msg_box').val();
            if(message)
            {
                sendChat(message);
            }
        });
        /*$('body').on("click",'#online-list span', function(e) { 
            
            if($(this).hasClass("active")){
                $(this).removeClass("active");
            }else{
                $(this).addClass("active");    
            }
           
        });
    */       
        function sendChat(message)  
        {
            var curr_date= moment().format("YYYY-MM-DDTHH:mm:ss.SSSZZ");
            chatpage.emit('sendcomment', {msg:message,user_id:user_id,room_id:room_id,datetime:curr_date});
        }
    }
    function confirmExit()
    {
        //alert("exiting");
        window.location.href='<? echo base_url();?>/home';
        return true;
    }
    window.onbeforeunload = confirmExit;
</script>