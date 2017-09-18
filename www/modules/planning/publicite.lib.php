<?php

function num2hex($num)
        {
        $num=round($num * 255);
       
        if($num>15) return dechex($num);
        else return '0'.dechex($num);
        }
		
function rgbnum2rgbhex($rgb){
	return num2hex($rgb['r']).num2hex($rgb['g']).num2hex($rgb['b']);
}	 

function hsl2rgb($hue, $saturation, $lightness)
        {
        if($lightness>0.5) $chroma=2 * (1 - $lightness) * $saturation;
        else $chroma=2 * $lightness * $saturation;
        $hue=$hue % 360;
        $hue2=$hue / 60;
        $x=$chroma * (1 - abs( fmod($hue2, 2) -1 ) );
        $m=$lightness - $chroma / 2;
        if($hue2<1)
                {
                $ret["r"]=$chroma;
                $ret["g"]=$x;
                $ret["b"]=0;
                }
        elseif($hue2<2)
                {
                $ret["r"]=$x;
                $ret["g"]=$chroma;
                $ret["b"]=0;
                }
        elseif($hue2<3)
                {
                $ret["r"]=0;
                $ret["g"]=$chroma;
                $ret["b"]=$x;
                }
        elseif($hue2<4)
                {
                $ret["r"]=0;
                $ret["g"]=$x;
                $ret["b"]=$chroma;
                }
        elseif($hue2<5)
                {
                $ret["r"]=$x;
                $ret["g"]=0;
                $ret["b"]=$chroma;
                }
        else
                {
                $ret["r"]=$chroma;
                $ret["g"]=0;
                $ret["b"]=$x;
                }
        $ret["r"]+=$m;
        $ret["g"]+=$m;
        $ret["b"]+=$m;
        return $ret;
        }

?>