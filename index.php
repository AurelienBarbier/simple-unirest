<?php require_once 'vendor/autoload.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Simple UNIREST exemple</title>
  </head>
  <body>
    <h1>Simple UNIREST Test</h1>
    <?php

        $headers = array('Accept' => 'application/json');
        $query = array('postId' => 1);

        $response = Unirest\Request::get('https://jsonplaceholder.typicode.com/comments', $headers, $query);
    ?>
    <p>
        Call on <strong>https://jsonplaceholder.typicode.com/comments</strong> with  <strong>GET</strong> method and parameter  <strong>"PostId"</strong> equals  <strong>1</strong>.
    </p>

    <fieldset>
      <legend>Formated parsed body</legend>
      <ul>
        <?php foreach($response->body as $data){ ?>
          <li>
            <strong><?= $data->postId; ?> - <?= $data->name; ?></strong>
            <p><?= $data->body; ?></p>
            <a href="mailto:<?= $data->email; ?>"><?= $data->email; ?></a>
            <hr/>
          </li>
        <?php } ?>
      </ul>
    </fieldset>

    <fieldset>
      <legend>HTTP Status code</legend>
      <pre>
        <?php var_dump($response->code);?>
      </pre>
    </fieldset>


    <fieldset>
      <legend>Headers</legend>
      <pre>
        <?php var_dump($response->headers);?>
      </pre>
    </fieldset>

    <fieldset>
      <legend>Parsed body</legend>
      <pre>
        <?php var_dump($response->body);?>
      </pre>
    </fieldset>
    <fieldset>
      <legend>Unparsed body</legend>
      <pre>
        <?php var_dump($response->raw_body);?>
      </pre>
    </fieldset>
  </body>
</html>
