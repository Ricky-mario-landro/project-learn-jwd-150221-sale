<?php

/**
 * Class Transaction
 *
 * @package   Latihan JWD : Handoko Adji Pangestu
 * @author    Handoko Adji Pangestu <Handokoadjipangestu@gmail.com>
 * @copyright Copyright (c) 2021 - 2022, Dokumenary Net.
 * @since     1.0
 * @link      http://dokumenary.net
 *
 * INDEMNITY
 * You agree to indemnify and hold harmless the authors of the Software and
 * any contributors for any direct, indirect, incidental, or consequential
 * third-party claims, actions or suits, as well as any related expenses,
 * liabilities, damages, settlements or fees arising from your use or misuse
 * of the Software, or a violation of any terms of this license.
 *
 * DISCLAIMER OF WARRANTY
 * THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESSED OR
 * IMPLIED, INCLUDING, BUT NOT LIMITED TO, WARRANTIES OF QUALITY, PERFORMANCE,
 * NON-INFRINGEMENT, MERCHANTABILITY, OR FITNESS FOR A PARTICULAR PURPOSE.
 *
 * LIMITATIONS OF LIABILITY
 * YOU ASSUME ALL RISK ASSOCIATED WITH THE INSTALLATION AND USE OF THE SOFTWARE.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS OF THE SOFTWARE BE LIABLE
 * FOR CLAIMS, DAMAGES OR OTHER LIABILITY ARISING FROM, OUT OF, OR IN CONNECTION
 * WITH THE SOFTWARE. LICENSE HOLDERS ARE SOLELY RESPONSIBLE FOR DETERMINING THE
 * APPROPRIATENESS OF USE AND ASSUME ALL RISKS ASSOCIATED WITH ITS USE, INCLUDING
 * BUT NOT LIMITED TO THE RISKS OF PROGRAM ERRORS, DAMAGE TO EQUIPMENT, LOSS OF
 * DATA OR SOFTWARE PROGRAMS, OR UNAVAILABILITY OR INTERRUPTION OF OPERATIONS.
 */

class Sales extends \stdClass
{
  /**
   * @var string
   */
  private $dbjson;

  /**
   * @var string
   */
  private $dbtxt;

  /**
   * @param string $dbjson
   * @param string $dbtxt
   */
  function __construct($dbjson, $dbtxt)
  {
    $this->dbjson = $dbjson;
    $this->dbtxt = $dbtxt;
  }

  /**
   * @return array
   */
  public function index()
  {
    $dataJson = file_get_contents($this->dbjson);
    return json_decode($dataJson);
  }

  /**
   * @param array $transaction
   * @param array $data
   * 
   * @return mixed
   */
  public function store($transaction, $data)
  {
    // save to json
    $category = explode(',', $transaction['category']);
    $item = explode(',', $transaction['item']);
    $price = (int) preg_replace("/[^0-9]/", "", $transaction['price']);
    $condition =  explode(',', $transaction['condition']);

    $invoice = "$category[0].$item[0]" . '.' . date('dmY') . '.' . explode(".", number_format($price, 2, ',', '.'))[0] . 'K/' . strtoupper($condition[0]);

    $data_old = (array) $data;
    $data_new = [
      '_id' => uniqid(),
      'invoice' => $invoice,
      'item' => $item[1],
      'category' => $category[1],
      'price' => $price,
      'condition' =>  $condition[1],
      'created_at' => date("d M Y"),
    ];

    array_push($data_old, $data_new);

    $data_json = json_encode($data_old, JSON_PRETTY_PRINT);
    file_put_contents($this->dbjson, $data_json);

    // save to txt
    $data_txt = fopen($this->dbtxt, "w") or die("Unable to open file!");
    fwrite($data_txt, implode("\n", $data_new));
    fclose($data_txt);

    $_SESSION['success'] = "Transaction successfully added";
    header('Location: http://localhost/project-learn/bpptik/project-learn-jwd-150221-sale/index.php?pref=sales&page=index');
    exit();
  }
}
