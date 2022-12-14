<?php
error_reporting(0);
class Kayitlar
{
    private $id, $adsoyad, $tcno;
    public function __construct($dbRow)
    {
        $this->id = $dbRow['id'];
        $this->adsoyad = $dbRow['adsoyad'];
        $this->tcno = $dbRow['tcno'];
    }
    public function idFonksiyon()
    {
        return $this->id;
    }
    public function adsoyadFonksiyon()
    {
        return $this->adsoyad;
    }
    public function tcnoFonksiyon()
    {
        return $this->tcno;
    }
    public function dogrulamaFonksiyon()
    {
        $gecersizDizisi = array(11111111110,22222222220,33333333330,44444444440,55555555550,66666666660,77777777770,88888888880,99999999990);
        $islem1 = (((($this->tcno[0] + $this->tcno[2] + $this->tcno[4] + $this->tcno[6] + $this->tcno[8]) * 7) - ($this->tcno[1] + $this->tcno[3] + $this->tcno[5] + $this->tcno[7]))) % 10 == $this->tcno[9];
        $islem2 = ($this->tcno[0] + $this->tcno[1] + $this->tcno[2] + $this->tcno[3] + $this->tcno[4] + $this->tcno[5] + $this->tcno[6] + $this->tcno[7] + $this->tcno[8] + $this->tcno[9] + $this->tcno[10]) % 10 == $this->tcno[10];

        if (filter_var($this->tcno, FILTER_VALIDATE_INT) && strlen($this->tcno) == 11 && substr($this->tcno, 0, 1) != 0 && !in_array($this->tcno, $gecersizDizisi) && $islem1 && $islem2) {
            return "T.C Kimlik Geçerli";
        } else {
            return "T.C Kimlik Geçersiz";
        }
    }
}
?>
