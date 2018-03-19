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
 * @subpackage Static
 */

print libHTML::pageTitle('Developer/webmaster info','If you want to fix/improve/install webDiplomacy all the info you need to make it happen is here.');

?>

<p>Webdiplomacy is open source, and we welcome contributions! You can find our todo list <a href="https://github.com/kestasjk/webDiplomacy/issues">here</a>, and our code <a href="https://github.com/kestasjk/webDiplomacy">here</a></p>

<div class="hr"></div>                                                                                                                                                                                                         

<h4>Feature requests</h4>

<p>We get a lot of feature requests. If your feature request isn't already on our issue tracker, then the best place to ask is the forum. This will help us gauge support for your ideas, before we add it to the todo list. </p>

<div class="hr"></div>                                                                                                                                                                                                         
<h4>Bug reports</h4> 

<p>If you're familiar with github, you're welcome to submit a bug report in our issue tracker. Please be as detailed as possible, and include steps to reproduce the bug, what happens, and what you expect to happen instead. If you don't want to use github, you can also email bug reports to webdipmod@gmail.com.</p>
<div class="hr"></div>                                                                                                                                                                                                         

<h4>Code contributions</h4> 

<p>We welcome code contributions for any of the issues on the "soon" milestone. Simply fork the project, and develop a fix in a branch. We accept pull requests that:</p>

<ul>
<li>are well tested</li>
<li>only include one fix per pull request</li>
<li>keep the code clean and maintainable</li>
<li>use the same style as the rest of webdip</li>
<li>keep whitespace changes to a minimum</li>
</ul>

<p>When writing the text of your pull request, please include:</p>

<ul>
<li>The details of the testing that you've performed</li>
<li>The github issue number that this pull request is a fix for</li>
</ul>

<p>Any questions, please email webdipmod@gmail.com, and a member of the dev team will answer.</p>


<div class="hr"></div>                                                                                                                                                                                                         
<h4>Code links</h4> 
<p><a href="https://github.com/kestasjk/webDiplomacy" class="light">github.com/kestasjk/webDiplomacy</a> - the code</p>
<p><a href="https://github.com/kestasjk/webDiplomacy/issues" class="light">github.com/kestasjk/webDiplomacy</a> - the issues</p>

<h4>Webmasters</h4>

<p><a href="http://webdiplomacy.net/README.txt" class="light">README.txt</a> - Installation data for webmasters</p>

<p><a href="http://webdiplomacy.net/AGPL.txt" class="light">AGPL.txt</a> - The license protecting this code, if you make
	changes to the code you've got to share those changes.</p>

<div class="hr"></div>

<h4>Layout</h4>

<p>If you want to make a change this is where you should start. The two images and text files below will give you a feel
for where everything is and how webDip is structured, so you know where to go to find whatever you need to change.</p>

<p><a href="http://webdiplomacy.net/doc/layout-code.png" class="light">layout-code.png</a>, <a href="http://webdiplomacy.net/doc/layout-code.txt" class="light">layout-code.txt</a>
- File/directory layout image and text file; how the code is structured and what different files do</p>

<p><a href="http://webdiplomacy.net/doc/layout-database.png" class="light">layout-database.png</a>,
<a href="http://webdiplomacy.net/doc/layout-database.txt" class="light">layout-database.txt</a>
 - The database layout image and text file; how the database is structured and what different tables do</p>

<div class="hr"></div>

<h4>Misc notes</h4>

<p><a href="http://webdiplomacy.net/doc/javascript.txt" class="light">javascript.txt</a> - JavaScript info</p>

<p><a href="http://webdiplomacy.net/doc/gotchas.txt" class="light">gotchas.txt</a> - Annoying quirks</p>

<p><a href="http://webdiplomacy.net/doc/archive.txt" class="light">archive.txt</a> - Info on the archive tables</p>

<p><a href="http://webdiplomacy.net/doc/coasts.txt" class="light">coasts.txt</a> - Info on how coasts are handled</p>

<p>We used to have a forum for developers, but it was closed due to inactivity and spammers. Some of the content there is still useful:
<a href="http://forum.webdiplomacy.net" class="light">forum.webdiplomacy.net</a>                                                    </p>
