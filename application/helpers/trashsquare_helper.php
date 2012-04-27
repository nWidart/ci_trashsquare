<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('user_nom_p'))
{
	function user_nom_p($nom,$prenom)
	{
		return $nom . " " . substr($prenom,0,1) . ".";
	}
}

if ( ! function_exists('get_user_rank'))
{
	function get_user_rank($score)
	{
		switch ($score) {
		case 1:
			$grade = "Débutant";
			break;
		case 2:
			$grade = "Initié";
			break;
		case 3:
			$grade = "Aventurier";
			break;
		case 4:
			$grade = "Explorateur";
			break;
		case 5:
			$grade = "Mr. Propre";
			break;
		case 6:
			$grade = "Écologiste";
			break;
		case 7:
			$grade = "Sénateur";
			break;
		case 8:
			$grade = "Député";
			break;
		case 9:
			$grade = "Échevin";
			break;
		case 10:
			$grade = "Bourgmestre";
			break;
		case 11:
			$grade = "Ministre";
			break;
		case 12:
			$grade = "Premier ministre";
			break;
		case 13:
			$grade = "Roi";
			break;
		case 14:
			$grade = "Roi";
			break;
		case 15:
			$grade = "Roi";
			break;
		case 16:
			$grade = "Roi";
			break;
		case 17:
			$grade = "Roi";
			break;
		case 18:
			$grade = "Roi";
			break;
		case 19:
			$grade = "Roi";
			break;
		case 20:
			$grade = "Roi";
			break;
		case 21:
			$grade = "Roi";
			break;
		default:
			$grade = "Débutant";
			break;
		}
		return $grade;
	}
}