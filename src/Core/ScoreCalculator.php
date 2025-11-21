<?php
namespace SEO\Lite\Core;
class ScoreCalculator { private $errors; public function __construct($errors){$this->errors=$errors;}
    public function getCurrentScore(){ $score=100-($this->errors*2); return max(30,$score);} public function getPotentialScore(){ return min(95,$this->getCurrentScore()+30);} }
