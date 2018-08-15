<?php
class Cliente
{

  private function getBody()
  {
    $client = new \GuzzleHttp\Client();
    $res = $client->request('GET', URL);

    if ($res->getStatusCode() !== 200) {
      echo "Erro ao capturar dados.";
      die();
    }

    return $res->getBody();
  }

  public function parseDOM()
  {
    $dom = new \DOMDocument();

    @$dom->loadHTML($this->getBody());
    $dom->preserveWhiteSpace = false;

    $tables = $dom->getElementsByTagName('table');
    $rows = $tables->item(0)->getElementsByTagName('tr');

    $result = null;
    foreach ($rows as $row) {
      $cols = $row->getElementsByTagName('td');
      $result[] = [
        'vigencia' => trim($cols->item(0)->nodeValue),
        'valor_mensal' => trim($cols->item(1)->nodeValue)
      ];
    }

    return $result;
  }

}