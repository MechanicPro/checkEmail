<?php
/**
 * Created by PhpStorm.
 * User: MechanicPro
 * Date: 17.02.2018
 * Time: 15:01
 */

class calc
{
    protected $data;
    protected $result;

    public function __construct($data = [])
    {
        $this->data = $data;
        $this->result = [];

        $this->calc_result();
    }

    private function calc_result()
    {
        $data = $this->data;
        $res = [];
        $user = '[a-zA-Z0-9_\-\.\+\^!#\$%&*+\/\=\?\`\|\{\}~\']+';
        $domain = '(?:(?:[a-zA-Z0-9]|[a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9])\.?)+';
        $ip4 = '[0-9]{1,3}(\.[0-9]{1,3}){3}';
        $ip6 = '[0-9a-fA-F]{1,4}(\:[0-9a-fA-F]{1,4}){7}';

        if (isset($data) && is_array($data)) {
            foreach ($data as $value) {
                $value = trim($value);
                if (preg_match("/^$user@($domain|(\[($ip4|$ip6)\]))$/", $value)) {
                    $value = stristr($value, '@');
                    $value = str_replace("@", "", $value);
                    $res[] = $value;
                } else {
                    $res[] = "INVALID";
                }
            }
            $res = array_count_values($res);
            $res = $this->sort($res);
            $this->setResult($res);
        }
    }

    private function sort($res)
    {
        arsort($res);
        return $res;
    }

    private function setResult($res)
    {
        $this->result = $res;
    }

    public function getResult()
    {
        return $this->result;
    }
}