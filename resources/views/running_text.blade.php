<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>running-text</title>
</head>
<body>
    <style>
        .running-container {
            overflow: hidden;
            white-space: nowrap;
            background: #222;
            color: white;
            padding: 10px 0;
        }
        .running-text {
            display: inline-block;
            padding-left: 100%;
            animation: runText 10s linear infinite;
        }
        @keyframes runText {
            from { transform: translateX(0%); }
            to { transform: translateX(-100%); }
        }
    </style>
</head>
<body>
    <div class="running-container">
        <span class="running-text">{{ $RunningText }}</span>
    </div>
</body>
</html>
</body>
</html>
