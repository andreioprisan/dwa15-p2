<!DOCTYPE html>
<head>
    <title>DWA15 - Project 2</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/formsubmit.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <a class="navbar-brand" href="#">DWA 15</a>
      <ul class="nav nav-pills">
        <li class="nav-item active">
          <a class="nav-link" href="http://p1.oprisan.com">P1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://p2.oprisan.com">P2 <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://p3.oprisan.com">P3</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://p4.oprisan.com">P4</a>
        </li>
      </ul>
    </nav>

    <div class="jumbotron">
      <div class="container">
        <h1>xkcd Password Generator</h1>
        <p>We're going to help you generate a word-based, secure password in just a few clicks. Word-based passwords are easier to remember and can be more secure than obscure passwords.<br/> Select from the options below to get started.</p>
        <form>
          <div class="form-group row">
            <label for="wordCount" class="col-sm-4 form-control-label">How many words would you like to include?</label>
            <div class="col-sm-2">          
              <select id="wordCount" name="wordCount" class="form-control">
                <option value="1">1</option>
                <option value="2" selected>2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="numbersCount" class="col-sm-4 form-control-label">How many numbers should be included?</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="numbersCount" name="numbersCount" placeholder="0">
            </div>
          </div>
          <div class="form-group row">
            <label for="specialCharactersCount" class="col-sm-4 form-control-label">How many special characters should be included?</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="specialCharactersCount" name="specialCharactersCount" placeholder="0">
            </div>
          </div>
          <div class="form-group row">
            <label for="includeHyphens" class="col-sm-4 form-control-label">Include hyphens</label>
            <div class="col-sm-2">
                <input type="checkbox" name="includeHyphens" id="includeHyphens" value="1">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4">Case</label>
            <div class="col-sm-4">
              <div class="radio">
                <label>
                  <input type="radio" name="caseSelection" id="caseSelection1" value="lower" checked>
                  lowercase
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="caseSelection" id="caseSelection2" value="upper">
                  upper case
                </label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-4">
              <input type="button" class="btn btn-primary btn-lg" id="generatePassword" value="Generate Password">
            </div>
            <div class="col-sm-8">
                <span id="generatedPassword" class="alert alert-success" role="alert"></span>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="container">
        <div class="pw-head">
            <a href="http://xkcd.com/936/">
                <img src="http://imgs.xkcd.com/comics/password_strength.png" alt="xkcd password generator info">
            </a>
            <p>Live URL: <a href="http://p1.oprisan.com">http://p2.oprisan.com</a></p>
            <p>GitHub URL: <a href="https://github.com/andreioprisan/dwa15-p1">https://github.com/
            andreioprisan/dwa15-p2</a></p>
        </div>
        </div>
    </div>
</body>
</html>