<?php

/**
 *
 * @package CoinMan
 */

class Coinman
{

  private $db;


  public function __construct($api_key, $api_secret)
  {
    $this->poloniex = new Poloniex($api_key, $api_secret);
    $this->db = new PDO('mysql:host=localhost;dbname=hng', 'root', '@hng.funmysql');
  }

  /**
   * Entry Method for running coinman
   * @return void
   */
  public function runCoinMan()
  {
    // two Ajax calls running
    if(isset($_GET['type']) && $_GET['type'] == 'catchData') {
      $this->catchData();
    } else {
      $this->loadData();
    }
  }


  public function catchData() {
    $coins = $this->getPairsFromDb();
    if(empty($coins)) {
      $coins = $this->poloniex->get_trading_pairs();
      $coins = $this->getOnlyBtc($coins);
      $this->savePairs($coins);
    }

    //$coins = $this->getOnlyBtc($coins);
    

    $cnt_coins = 0;

    foreach ($coins as $key => $coin) {

        $tradeData = $this->poloniex->get_trade_history($coin);
        $sales = $this->countTransaction($tradeData, 'sell');
        $buys = $this->countTransaction($tradeData, 'buy');
      
        $oldDifference = $this->getOldTransaction($coin, 'difference');
        
        $newDifference = $buys - $sales;
      
        $increase = $newDifference - $oldDifference;
        $percentIncrease = $oldDifference != 0 ? ($increase/$oldDifference) * 100 : 0;
        $coinData = [
                    $coin,
                    $buys,
                    $sales,
                    $newDifference,
                    $percentIncrease,
        ];

        $this->saveCoinData($coinData);
    }

  }
  
  private function getOldTransaction($pair, $type) {
    $previousData = $this->db->query("SELECT $type FROM trade_history WHERE pair = '$pair' LIMIT 1");
    $previousData = $previousData->fetch()[$type];
    return $previousData;
  }

  public function loadData() {
    $exe = $this->db->query("SELECT * FROM trade_history ORDER BY buys DESC LIMIT 5");
    $exe2 = $this->db->query("SELECT * FROM trade_history ORDER BY sales DESC LIMIT 5");
    $buysData = $exe->fetchAll();
    $sellsData = $exe2->fetchAll();
    $overAllAveragePercentIncrease = $this->getAllAveragePercentIncrease();

    $arr = [
            'buys' => $buysData, 
            'sales' => $sellsData,
            'overallAveragePercentIncrease' => $overAllAveragePercentIncrease,        
    ];

    $this->json_response($arr);
  }
  
  
  private function getAllAveragePercentIncrease() {
    $exe = $this->db->query("SELECT * FROM trade_history ");
    $trades = $exe->fetchAll(PDO::FETCH_ASSOC);
    $nos = count($trades);
    $totalPercentIncrease = 0;
    foreach ($trades as $key => $value) {
      $totalPercentIncrease = $totalPercentIncrease + $value['perIncrease'];
    }

    $avg = $totalPercentIncrease / $nos;

    return ($avg > 0) ? $avg : (-1 * $avg);
  }

  private function saveCoinData($coinData) {
    $coin = $coinData[0];
    $buys = $coinData[1];
    $sales = $coinData[2];
    $diff = $coinData[3];
    $perIncrease = $coinData[4];
    $e = $this->db->query("UPDATE trade_history SET buys = '$buys', sales= '$sales', difference = '$diff', perIncrease = '$perIncrease' WHERE pair = '$coin'");
    if(!$e) {
     //echo  $this->db->errorInfo()[2];
      //exit;
    }
  }

  private function getPairsFromDb() {
    $exe = $this->db->query("SELECT pairs FROM pair LIMIT 1");
    $pairJSON = $exe->fetch(PDO::FETCH_ASSOC)['pairs'];
    return json_decode($pairJSON, true);
  }

  private function savePairs($pairs) {
    $pairs = json_encode($pairs);
    $exe = $this->db->query("INSERT into pair VALUES (null, '$pairs')");
  }


  private function getOnlyBtc($pairs) {
    foreach ($pairs as $key => $value) {
        $pos = strpos($value, 'BTC');
      if($pos === false) {
        unset($pairs[$key]);
      }
    }
    return $pairs;
  }

  private function countTransaction($tradeData, $type) {
    $count = 0;
    if(!empty($tradeData)) {
      foreach ($tradeData as $key => $value) {
        if($value['type'] == $type)
          $count++;
      }
    }
    return $count;
  }

  // Not being used for now
  private function getDifference($pair, $buys, $sales) {
    $previousData = $this->db->query("SELECT * FROM trade_history WHERE pair = '$pair'");
    $previousData = $previousData->fetch();
  }

  /**
   * Sends back json_encoded data to the client
   * @param  mixed $data data to be sent
   * @return void
   */
  public function json_response($data)
  {
    header('Content-type: application/json');
    $jsonData = json_encode($data);
    echo $jsonData;
  }
}
