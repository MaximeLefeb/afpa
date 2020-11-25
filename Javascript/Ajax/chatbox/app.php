<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="app.css">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <section id="chat">
                    <div class="messages">
                        <div class="message">
                            <span class="date"></span>
                        </div>
                    </div>
                </section>

                <div class="user-inputs">
                    <form action="handler.php?task=write">
                        <input type="text" name="author" id="author" placeholder="Pseudo">
                        <input type="text" name="content" id="content" placeholder="Votre message...">

                        <button type="submit"> Envoyer </button>
                    </form>
                </div>
            </div>
        </div>

        <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
        </script>
        <script
			type="text/javascript" 
			src="script.js">
		</script>
    </body>
</html>