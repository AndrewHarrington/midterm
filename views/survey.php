<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Survey</title>
</head>
<body>
    <h1>Midterm Survey</h1>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Name" value="{{@name}}">
        <check if="{{ isset(@errors)}} ">
            <p>{{@errors.nameERR}}</p>
        </check>
        <repeat group="{{@SESSION.boxes}}" key="@key" value="@val">
            <div>
                <input type="checkbox" name="boxes[]" id="{{@key}}" value="{{@val}}" >
                <label for="{{@key}}">{{@val}}</label>
            </div>
        </repeat>
        <check if="{{ isset(@errors)}} ">
            <p>{{@errors['boxERR']}}</p>
        </check>
        <button type="submit">Submit</button>
    </form>
</body>
</html>