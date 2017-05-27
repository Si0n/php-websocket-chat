<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/styles/style.css">
</head>
<body>
<div class="container clearfix">
    <!--<div class="people-list" id="people-list">
		<div class="search">
			<input type="text" placeholder="search" />
			<i class="fa fa-search"></i>
		</div>
		<ul class="list">
			<li class="clearfix">
				<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01.jpg" alt="avatar" />
				<div class="about">
					<div class="name">Vincent Porter</div>
					<div class="status">
						<i class="fa fa-circle online"></i> online
					</div>
				</div>
			</li>

			<li class="clearfix">
				<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_02.jpg" alt="avatar" />
				<div class="about">
					<div class="name">Aiden Chavez</div>
					<div class="status">
						<i class="fa fa-circle offline"></i> left 7 mins ago
					</div>
				</div>
			</li>

			<li class="clearfix">
				<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_03.jpg" alt="avatar" />
				<div class="about">
					<div class="name">Mike Thomas</div>
					<div class="status">
						<i class="fa fa-circle online"></i> online
					</div>
				</div>
			</li>

			<li class="clearfix">
				<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_04.jpg" alt="avatar" />
				<div class="about">
					<div class="name">Erica Hughes</div>
					<div class="status">
						<i class="fa fa-circle online"></i> online
					</div>
				</div>
			</li>

			<li class="clearfix">
				<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_05.jpg" alt="avatar" />
				<div class="about">
					<div class="name">Ginger Johnston</div>
					<div class="status">
						<i class="fa fa-circle online"></i> online
					</div>
				</div>
			</li>

			<li class="clearfix">
				<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_06.jpg" alt="avatar" />
				<div class="about">
					<div class="name">Tracy Carpenter</div>
					<div class="status">
						<i class="fa fa-circle offline"></i> left 30 mins ago
					</div>
				</div>
			</li>

			<li class="clearfix">
				<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_07.jpg" alt="avatar" />
				<div class="about">
					<div class="name">Christian Kelly</div>
					<div class="status">
						<i class="fa fa-circle offline"></i> left 10 hours ago
					</div>
				</div>
			</li>

			<li class="clearfix">
				<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_08.jpg" alt="avatar" />
				<div class="about">
					<div class="name">Monica Ward</div>
					<div class="status">
						<i class="fa fa-circle online"></i> online
					</div>
				</div>
			</li>

			<li class="clearfix">
				<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_09.jpg" alt="avatar" />
				<div class="about">
					<div class="name">Dean Henry</div>
					<div class="status">
						<i class="fa fa-circle offline"></i> offline since Oct 28
					</div>
				</div>
			</li>

			<li class="clearfix">
				<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_10.jpg" alt="avatar" />
				<div class="about">
					<div class="name">Peyton Mckinney</div>
					<div class="status">
						<i class="fa fa-circle online"></i> online
					</div>
				</div>
			</li>
		</ul>
	</div>
	-->
    <div class="chat">
        <div class="chat-header clearfix">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01_green.jpg" alt="avatar"/>

            <div class="chat-about">
                <div class="chat-with">Chat with Vincent Porter</div>
                <div class="chat-num-messages">already 1 902 messages</div>
            </div>
            <i class="fa fa-star"></i>
        </div> <!-- end chat-header -->

        <div class="chat-history">
            <ul>
                <!--<li>
					<div class="message-data">
						<span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
						<span class="message-data-time">10:31 AM, Today</span>
					</div>
					<i class="fa fa-circle online"></i>
					<i class="fa fa-circle online" style="color: #AED2A6"></i>
					<i class="fa fa-circle online" style="color:#DAE9DA"></i>
				</li>-->

            </ul>

        </div> <!-- end chat-history -->

        <div class="chat-message clearfix">
            <textarea name="message-to-send" id="message-to-send" placeholder="Type your message" rows="3"></textarea>
            <i class="fa fa-file-o"></i>
            <i class="fa fa-file-image-o"></i>
            <button id="send">Send</button>

        </div> <!-- end chat-message -->

    </div> <!-- end chat -->

</div> <!-- end container -->

<script id="message-template" type="text/x-handlebars-template">
    <li class="clearfix {{class}}">
        <div class="message-data align-right">
            <span class="message-data-time">{{time}}</span> &nbsp; &nbsp;
            <span class="message-data-name">{{name}}</span> <i class="fa fa-circle me"></i>
        </div>
        <div class="message other-message float-right">
            {{message}}
        </div>
    </li>
</script>

<script id="message-response-template" type="text/x-handlebars-template">
    <li>
        <div class="message-data">
            <span class="message-data-name"><i class="fa fa-circle online"></i>{{name}}</span>
            <span class="message-data-time">{{time}}</span>
        </div>
        <div class="message my-message">
            {{message}}
        </div>
    </li>
</script>
<script id="message-system-template" type="text/x-handlebars-template">
    <li>
        <div class="system-message">
            {{message}}
        </div>
    </li>
</script>

<script src="/scripts/jquery-3.2.1.min.js"></script>
<script src="/scripts/handlebars-v4.0.5.js"></script>
<script src="/scripts/list.min.js"></script>
<script>
    'use strict'

    class Application {
        constructor(parameters) {
            this.socket = new WebSocket(parameters.address);
            this.renderer = Handlebars;
            this.$doc = $(document);
            if (parameters.onOpen) {
                this.onOpen(parameters.onOpen);
            }
            if (parameters.onMessage) {
                this.onMessage(parameters.onMessage);
            }
        }

        renderOutMessage($target, message) {
            let template = Handlebars.compile($("#message-template").html());

            $target.append(template(message));
        }

        renderInMessage($target, message) {
            let template = Handlebars.compile($("#message-response-template").html());
            $target.append(template(message));
        }

        renderSystemMessage($target, message) {
            let template = Handlebars.compile($("#message-system-template").html());
            $target.append(template(message));
        }

        sendMessage(message) {
            if (message && typeof message != 'string') {
                message = JSON.stringify(message);
            }
            this.socket.send(message);
        }

        onMessage(callback) {
            this.socket.onmessage = callback;
        }

        onOpen(callback) {
            this.socket.onopen = callback;
        }
    }

    const App = new Application({
        address: "ws://" + location.hostname + ":9000/server.php",
        onMessage: e => {
            //e.data
            var message = JSON.parse(e.data);
            switch (message.type) {
                case 'system' :
                    if (!App.id) {
                        App.id = message.id;
                    }
                    App.renderSystemMessage($('.chat-history'), message);
                    break;
                default :
                    if (message.author_id != App.id) {
                        App.renderInMessage($('.chat-history'), message);
                    } else {
                        App.renderOutMessage($('.chat-history'), message);
                    }
                    break;
            }

        },
        onOpen: () => {
            //App.sendMessage({id: App.id, 'message': 'Socket Application'});
        }
    });
    $(document).on("click", "#send", e => {
        e.preventDefault ? e.preventDefault() : e.returnValue = false;
        if (!$('#message-to-send').length || !$('#message-to-send').val()) return false;
        App.sendMessage({author: 'Sion', id: App.id, 'type': 'out', "message": $('#message-to-send').val()});
        $('#message-to-send').val("");
    });
    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }

</script>

</body>
</html>