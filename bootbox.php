<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset=utf-8>
    <title>Examples | Bootbox.js&mdash;alert, confirm and flexible dialogs for Twitter's Bootstrap framework</title>

    <!-- CSS dependencies -->
    <link rel="stylesheet" type="text/css" href="js/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="js/main.css" />
   
</head>
<body>
    <div class="bb-alert alert alert-info" style="display:none;">
        <span>The examples populate this alert with dummy content</span>
    </div>

    <div class="navbar navbar-static-top navbar-inverse">
        <div class=navbar-inner>
            <a id=top class="brand brand-active" href="http://bootboxjs.com">Bootbox.js</a>
            <ul class=nav>
                <li><a href="index.html#about">About</a></li>
                <li><a href="index.html#api">Core Methods</a></li>
                <li><a href="index.html#examples">Examples</a></li>
                <li><a href="index.html#download">Download</a></li>
                <li><a href="index.html#dependencies">Dependencies</a></li>
                <li><a href="index.html#usage">Usage</a></li>
                <li class=divider-vertical></li>
                <li><a href="https://github.com/makeusabrew/bootbox">GitHub Repository</a></li>
                <li><a href="http://paynedigital.com/bootbox">Read the writeup</a></li>
                <li><a href="http://twitter.com/makeusabrew">Twitter</a></li>
            </ul>
        </div>
    </div>

    <div class="container lead-top">
        <div class=page-header>
            <h1>Examples</h1>
        </div>

        <p class="alert alert-info">
            This page needs you! We need lots more examples. Please consider helping out
            by <a href="https://github.com/makeusabrew/bootbox/tree/gh-pages">forking the project</a> on GitHub.
        </p>

        <p><b>Please note:</b> the &lsquo;Example&rsquo; object used in the following examples
        simply displays a notification to help illustrate when each callback is invoked. It is nothing
        to do with Bootbox itself, but you may <a href="js/example.js">view its source</a> if you&rsquo;re
        interested in how it works.</p>

        <div class=row>
            <div class=span12>
                <p class=lead>
                    Alert
                    <a href="#" data-bb="alert_callback" class="btn"><i class=icon-play></i></a>
                </p>
                <script src="https://gist.github.com/10a21523641a211529da.js"></script>
            </div>
        </div>
        <div class=row>
            <div class=span12>
                <p class=lead>
                    Confirm
                    <a href="#" data-bb="confirm" class="btn"><i class=icon-play></i></a>
                </p>
                <script src="https://gist.github.com/f06984e4c5b37f121b85.js"></script>
            </div>
        </div>
        <div class=row>
            <div class=span12>
                <p class=lead>
                    Prompt
                    <a href="#" data-bb="prompt" class="btn"><i class=icon-play></i></a>
                </p>
                <script src="https://gist.github.com/bb3fd1f1a2c5899ef17e.js"></script>
            </div>
        </div>
        <div class=row>
            <div class=span12>
                <p class=lead>
                    Custom Dialog
                    <a href="#" data-bb="dialog" class="btn"><i class=icon-play></i></a>
                </p>
                <script src="https://gist.github.com/9c8e730237b903511fc8.js"></script>
            </div>
        </div>
    </div>
    <div class='well container'>
        <div style='float:right'>
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://paynedigital.com/2011/11/bootbox-js-alert-confirm-dialogs-for-twitter-bootstrap" data-via="makeusabrew" data-related="makeusabrew" data-size="large">Tweet</a>
            <a href="https://twitter.com/makeusabrew" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @makeusabrew</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
        &copy; 2011-2012 <a href="http://twitter.com/makeusabrew">Nick Payne</a>.
        I run <a href="http://paynedigital.com">a small company</a>&mdash;why not see if you want to
        <a href="http://paynedigital.com/contact">work with us</a>?
    </div>

    <!-- JS dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/example.js"></script>
    <script>
        $(function() {
            Example.init({
                "selector": ".bb-alert"
            });
        });
    </script>

    <!-- bootbox code -->
    <script src="js/bootbox.js"></script>

    <!-- put all demo code in one place -->
    <script src="js/demos.js"></script>
</body>
</html>
