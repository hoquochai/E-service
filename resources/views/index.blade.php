<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>E-service</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    E-Service
                </div>
                <div class="m-b-md service-note">
                    <p>E-service can help you send mail to another email quickly and conveniently</p>
                </div>
                <div class="alert-message"></div>
                <div class="links">
                    <form class="send-mail-fr">
                        <div class="form-group">
                            <label for="receiver">Mail to</label>
                            <input class="form-control" name="receiver" id="receiver">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input class="form-control" name="subject" id="subject">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-default btn-reset">Reset</button>
                            <button type="button" class="btn btn-success btn-send">Send</button>
                        </div>
                    </form>
                </div>
                <div class="server-info">
                    <div class="url" data-value="{{ route('send_mail') }}"></div>
                    <div class="api_key" data-value="{{ $api_key }}"></div>
                </div>
            </div>
        </div>
        <div id="overlay">
            <div class="cv-spinner">
                <span class="spinner"></span>
            </div>
        </div>

        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- Jquery validation -->
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

        <!-- Javascript -->
        <script src="{{ asset('assets/js/index.js') }}"></script>
    </body>
</html>
