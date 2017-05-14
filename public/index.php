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
			<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01_green.jpg" alt="avatar" />

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
			<textarea name="message-to-send" id="message-to-send" placeholder ="Type your message" rows="3"></textarea>

			<i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
			<i class="fa fa-file-image-o"></i>

			<button>Send</button>

		</div> <!-- end chat-message -->

	</div> <!-- end chat -->

</div> <!-- end container -->

<script id="message-template" type="text/x-handlebars-template">
	<li class="clearfix">
		<div class="message-data align-right">
			<span class="message-data-time" >{{time}}, Today</span> &nbsp; &nbsp;
			<span class="message-data-name" >Olia</span> <i class="fa fa-circle me"></i>
		</div>
		<div class="message other-message float-right">
			{{messageOutput}}
		</div>
	</li>
</script>

<script id="message-response-template" type="text/x-handlebars-template">
	<li>
		<div class="message-data">
			<span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
			<span class="message-data-time">{{time}}, Today</span>
		</div>
		<div class="message my-message">
			{{response}}
		</div>
	</li>
</script>

<script src="/scripts/jquery-3.2.1.min.js"></script>
<script src="/scripts/handlebars-v4.0.5.js"></script>
<script src="/scripts/list.min.js"></script>
<script>
    $(document).ready(function(){
        //create a new WebSocket object.
        var conn = new WebSocket("ws://192.168.1.9:9000/server.php");
        conn.onmessage = function(e){ console.log(e.data); };
        conn.onopen = () => conn.send(JSON.stringify({'name' : 'Sion', 'color' : 'fff', 'message' : 'It Works!'}));
	});
</script>
<script defer>
    (function(){

        var chat = {
            messageToSend: '',
            messageResponses: [
                'Why did the web developer leave the restaurant? Because of the table layout.',
                'How do you comfort a JavaScript bug? You console it.',
                'An SQL query enters a bar, approaches two tables and asks: "May I join you?"',
                'What is the most used language in programming? Profanity.',
                'What is the object-oriented way to become wealthy? Inheritance.',
                'An SEO expert walks into a bar, bars, pub, tavern, public house, Irish pub, drinks, beer, alcohol'
            ],
            init: function() {
                this.cacheDOM();
                this.bindEvents();
                this.render();
            },
            cacheDOM: function() {
                this.$chatHistory = $('.chat-history');
                this.$button = $('button');
                this.$textarea = $('#message-to-send');
                this.$chatHistoryList =  this.$chatHistory.find('ul');
            },
            bindEvents: function() {
                this.$button.on('click', this.addMessage.bind(this));
                this.$textarea.on('keyup', this.addMessageEnter.bind(this));
            },
            render: function() {
                this.scrollToBottom();
                if (this.messageToSend.trim() !== '') {
                    var template = Handlebars.compile( $("#message-template").html());
                    var context = {
                        messageOutput: this.messageToSend,
                        time: this.getCurrentTime()
                    };

                    this.$chatHistoryList.append(template(context));
                    this.scrollToBottom();
                    this.$textarea.val('');

                    // responses
                    var templateResponse = Handlebars.compile( $("#message-response-template").html());
                    var contextResponse = {
                        response: this.getRandomItem(this.messageResponses),
                        time: this.getCurrentTime()
                    };

                    setTimeout(function() {
                        this.$chatHistoryList.append(templateResponse(contextResponse));
                        this.scrollToBottom();
                    }.bind(this), 1500);

                }

            },

            addMessage: function() {
                this.messageToSend = this.$textarea.val()
                this.render();
            },
            addMessageEnter: function(event) {
                // enter was pressed
                if (event.keyCode === 13) {
                    this.addMessage();
                }
            },
            scrollToBottom: function() {
                this.$chatHistory.scrollTop(this.$chatHistory[0].scrollHeight);
            },
            getCurrentTime: function() {
                return new Date().toLocaleTimeString().
                replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
            },
            getRandomItem: function(arr) {
                return arr[Math.floor(Math.random()*arr.length)];
            }

        };

        chat.init();

        var searchFilter = {
            options: { valueNames: ['name'] },
            init: function() {
                var userList = new List('people-list', this.options);
                var noItems = $('<li id="no-items-found">No items found</li>');

                userList.on('updated', function(list) {
                    if (list.matchingItems.length === 0) {
                        $(list.list).append(noItems);
                    } else {
                        noItems.detach();
                    }
                });
            }
        };

        searchFilter.init();

    });

</script>
</body>
</html>