<?php
/*
    Copyright (C) 2004-2010 Kestas J. Kuliukas

	This file is part of webDiplomacy.

    webDiplomacy is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    webDiplomacy is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with webDiplomacy.  If not, see <http://www.gnu.org/licenses/>.
 */

defined('IN_CODE') or die('This script can not be run by itself.');

/**
 * @package Base
 * @subpackage Forms
 */
?>
<div class="content-bare content-board-header content-title-header">
<div class="pageTitle barAlt1">
	Create a new game
</div>
<div class="pageDescription barAlt2">
Beginne ein neues Spiel; du entscheidest, wie es heißt, wie lange die Phasen dauern, und was es wert ist.
</div>
</div>
<div class="content content-follow-on">
<form method="post">
<ul class="formlist">

	<li class="formlisttitle">
		Name:
	</li>
	<li class="formlistfield">
		<input type="text" name="newGame[name]" value="" size="30">
	</li>
	<li class="formlistdesc">
		Der Name des Spiels
	</li>

	<li class="formlisttitle">
		Phasen-Länge: (5 Minuten - 10 Tage)
	</li>
	<li class="formlistfield">
		<select name="newGame[phaseMinutes]" onChange="document.getElementById('wait').selectedIndex = this.selectedIndex">
		<?php
			$phaseList = array(5,7, 10, 15, 20, 30,
				60, 120, 240, 360, 480, 600, 720, 840, 960, 1080, 1200, 1320,
				1440, 2160, 2880, 4320, 5760, 7200, 8640, 10080, 14400, 1440+60, 2880+60*2);

			foreach ($phaseList as $i) {
				$opt = libTime::timeLengthText($i*60);

				print '<option value="'.$i.'"'.($i==1440 ? ' selected' : '').'>'.$opt.'</option>';
			}
		?>
		</select>
	</li>
	<li class="formlistdesc">
		Die Zeit, die die Spieler pro Phase maximal für Diskussionen und das Abgeben von Zügen haben.<br />
		Längere Spiel-Phasen bedeuten mehr Zeit für sorgfälltige Überlegungen und Absprachen - aber brauchen schlichtweg mehr Zeit.
		Kürzere Phasen bringen ein schnelleres Spiel mit sich. Die Spieler, die an einem schnellen Spiel teilnehmen, müssen aber auch die Zeit mitbringen, sich in kurzen Abständen am Spiel zu beteiligen.<br /><br />

		<strong>Standard:</strong> 24 Stunden/1 Tag
	</li>

	<li class="formlisttitle">
		Einsatz: (5<?php print libHTML::points(); ?>-
			<?php print $User->points.libHTML::points(); ?>)
	</li>
	<li class="formlistfield">
		<input type="text" name="newGame[bet]" size="7" value="<?php print $formPoints ?>" />
	</li>
	<li class="formlistdesc">
		Der Einsatz, der von jedem Spieler gesetzt werden muss, um einem Spiel beizutreten.
		Die Summe der Einsätze aller Spieler (auch deiner!) bilden den "Pott", um den in dieser Partie gespielt wird. (<a href="points.php" class="light">mehr Infos</a>).<br />

		<strong>Standard:</strong> <?php print $defaultPoints.libHTML::points(); ?>
	</li>

	<li class="formlisttitle">
		<img src="images/icons/lock.png" alt="Private" />Invite Code (optional):
	</li>
	<li class="formlistfield">
		<ul>
			<li>Invite Code: <input type="password" name="newGame[password]" value="" size="30" /></li>
			<li>Confirm: <input type="password" name="newGame[passwordcheck]" value="" size="30" /></li>
		</ul>
	</li>
	<li class="formlistdesc">
		<strong>Dies ist optional.</strong> Wenn du den Invite Code setzt können nur Spieler beitreten die den Code kennen.<br /><br />

		<strong>Standard:</strong> Kein Invite Code
	</li>
</ul>

<div class="hr"></div>

<div id="AdvancedSettingsButton">
<ul class="formlist">
	<li class="formlisttitle">
		<a href="#" onclick="$('AdvancedSettings').show(); $('AdvancedSettingsButton').hide(); return false;">
		Erweiterte Einstellungen öffnen
		</a>
	</li>
	<li class="formlistdesc">
		Die erweiterten Einstellungen erlauben weitere Anpassungen für gestandene Spieler,
		 wie z.B. verschiedene Karten-Typen, alternative Regeln oder besondere Zeit-Optionen.<br /><br />

		Die Standard-Einstellungen sind genau richtig für <strong>neue Spieler</strong>.
	</li>
</ul>
</div>

<div id="AdvancedSettings" style="<?php print libHTML::$hideStyle; ?>">

<h3>Erweiterte Einstellungen</h3>

<ul class="formlist">
<?php
if( count(Config::$variants)==1 )
{
	foreach(Config::$variants as $variantID=>$variantName) ;

	$defaultVariantName=$variantName;

	print '<input type="hidden" name="newGame[variantID]" value="'.$variantID.'" />';
}
else
{
?>
	<li class="formlisttitle">Variante (Karte/Regeln):</li>
	<li class="formlistfield">
	<?php
	$checkboxes=array();
	$first=true;
	foreach(Config::$variants as $variantID=>$variantName)
	{
		if($variantID != 57)
		{
			if( $first )
				$defaultVariantName=$variantName;
			$Variant = libVariant::loadFromVariantName($variantName);
			$checkboxes[] = '<input type="radio" '.($first?'checked="on" ':'').'name="newGame[variantID]" value="'.$variantID.'"> '.$Variant->link();
			$first=false;
		}
	}
	print '<p>'.implode('</p><p>', $checkboxes).'</p>';
	?>
	</li>
	<li class="formlistdesc">
		Wähle aus dieser Liste verfügbarer Spiel-Varianten/-Regeln, welche Art von Diplomacy-Partie du starten
		möchtest.<br /><br />

		Klicke auf einen Varianten-Namen, um mehr Details über die Variante zu erfahren.<br /><br />
		
		<strong>*Please note that 1 vs 1 games will default to a 5 point bet as an unranked game no matter what bet/game type are selected</strong>
		<br /><br />

		<strong>Standard:</strong> <?php print $defaultVariantName; ?>
	</li>
<?php
}
?>

	<li class="formlisttitle">Pott-Typ:</li>
	<li class="formlistfield">
		<input type="radio" name="newGame[potType]" value="Winner-takes-all" checked > Draw-Size Scoring (previously called WTA)<br />
		<input type="radio" name="newGame[potType]" value="Sum-of-squares" > Sum-of-Squares Scoring (<a href="points.php#SoS">more information</a>)<br />
		<input type="radio" name="newGame[potType]" value="Unranked" > Unranked (your bet is refunded at the end of the game)
	</li>
	<li class="formlistdesc">
		Soll der Gewinn unter den am Ende des Spiels übrigen Spielern aufgeteilt werden (Points-per-supply-center)
			oder bekommt der Gewinner den gesammten Pott (Winner-takes-all)? (<a href="points.php#ppscwta" class="light">Mehr Infos zu Pott-Typen</a>).<br /><br />

		<strong>Default:</strong> Draw-Size Scoring
	</li>

	<li class="formlisttitle">
		Anonyme Spieler:
	</li>
	<li class="formlistfield">
		<input type="radio" name="newGame[anon]" value="No" checked>Nein
		<input type="radio" name="newGame[anon]" value="Yes">Ja
	</li>
	<li class="formlistdesc">
		Wenn auf "Ja" gesetzt werden im Spiel keine Namen und Benutzer-Infos angezeigt. Die Spieler bleiben bis zum Ende der Partie anonym.<br /><br />

		<strong>Standard:</strong> Nein, die Spieler sind nicht anonym.
	</li>

	<li class="formlisttitle">
		Spielnachrichten deaktivieren:
	</li>
	<li class="formlistfield">
		<input type="radio" name="newGame[pressType]" value="Regular" checked>Alle erlauben
		<input type="radio" name="newGame[pressType]" value="PublicPressOnly">Nur globale Nachrichten, keine privaten
		<input type="radio" name="newGame[pressType]" value="NoPress">Keine Nachrichten
		<input type="radio" name="newGame[pressType]" value="RulebookPress">Wie in den Regeln
	</li>
	<li class="formlistdesc">
		Deaktiviert einige Arten von Nachrichten, die Spieler sich im Spiel schicken können. Je nach Auswahl werden alle, nur globale oder gar keine Nachrichten erlaubt.

		<br/><br/> "Wie in den regeln" means no discussion during builds and retreats as per the original Diplomacy rulebook. In this mode, saved retreats and builds are automatically readied for the next turn.
		<br /><br /><strong>Standard:</strong> Alle erlauben
	</li>
	<li class="formlisttitle">
		Draw votes:
	</li>
	<li class="formlistfield">
		<input type="radio" name="newGame[drawType]" value="draw-votes-public" checked>Public draw votes
		<input type="radio" name="newGame[drawType]" value="draw-votes-hidden">Hidden draw votes
	</li>
	<li class="formlistdesc">
		Whether or not draw votes can be seen by the other players. In both modes, the game will be drawn when all players have voted draw. However, if draw votes are 
		hidden then you are the only one who knows whether you have voted to draw or not. 
		<br /><br /><strong>Default:</strong>Public draw votes
	</li>

	<li class="formlisttitle">
		Joining pre-game period length: (5 minutes - 10 days)
	</li>
	<li class="formlistfield">
		<select id="wait" name="newGame[joinPeriod]">
		<?php
			foreach ($phaseList as $i) {
				$opt = libTime::timeLengthText($i*60);

				print '<option value="'.$i.'"'.($i==1440 ? ' selected' : '').'>'.$opt.'</option>';
			}
		?>
		</select>
	</li>
	<li class="formlistdesc">
		Die länge der Phase, die Benutzer haben, um diesem Spiel beizutreten (=Vorspiel-Phase). Diese Option besteht, um beispielsweise auch in Fünf-Minuten-Spielen den Benutzern mehr Zeit zum Beitreten einzuräumen. 

		<br /><br /><strong>Standard:</strong> Gleiche Länge wie die übrigen Spielphasen
	</li>
	<li class="formlisttitle">
		Reliability-Rating Vorraussetzungen:
	</li>
	<li class="formlistfield">
		Reliability Rating: <input id="minRating" type="text" name="newGame[minimumReliabilityRating]" size="2" value="0"
			style="text-align:right;"
			onkeypress="if (event.keyCode==13) this.blur(); return event.keyCode!=13"
			onChange="
				this.value = parseInt(this.value);
				if (this.value == 'NaN' ) this.value = 0;
				if (this.value < 0 ) this.value = 0;
				if (this.value > 100 ) this.value = 100;
				"/>% oder besser.  
	</li>
	<li class="formlistdesc">
		<li><b>Minimum Reliability-Rating:</b> Die Zuverlässigkeit (Reliability-Rating), die ein Spieler mindestens erfüllen soll.</li>
			<li><b>Minimum gespielte Phasen:</b> Die Anzahl an Phasen, die ein Spieler mindestens gespielt haben soll.</li>
		</ul>
		Diese Einstellungen können dazu führen, dass nicht genug Spieler beitreten können. Die Einschränkungen sollten also mit Bedacht gewählt werden.<br /><br />
		
		<strong>Standard:</strong> Keine Vorraussetzungen:
	</li>
	   
<!-- 
	<li class="formlisttitle">
		No moves received options:
	</li>
	<li class="formlistfield">
		<input type="radio" name="newGame[missingPlayerPolicy]" value="Normal" checked > Normal<br />
		<input type="radio" name="newGame[missingPlayerPolicy]" value="Wait"> Wait for all players
	</li>
	<li class="formlistdesc">
		What should happen if the end of the turn comes and a player has not submitted any orders?<br /><br />
		
		If set to <strong>Normal</strong> the game will proceed, and after 
		a couple of turns they will go into civil disorder and their country can be taken over by another player.<br /><br />
		
		If set to <strong>Wait for all players</strong> the game will not continue until all players have submitted their orders.<br />
		This avoids any issues caused by 
		someone not submitting their orders on time, but it means that if someone becomes unavailable the game will not continue until they either
		return, or a moderator manually sets them to civil disorder.<br /><br />

		<strong>Default:</strong> Normal
	</li>
	 -->
</ul>

</div>

<div class="hr"></div>

<p class="notice">
	<input type="submit" class="form-submit" value="Create">
</p>
</form>
