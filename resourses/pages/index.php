<h2><p>Class "navigation"</p></h2>
<b><p>Calling:</b> $red->nav->method();</p>
<b><p>Methods:</b> now, loadPage, id, loadPart, redirect, link.</p>
<br>

<h3><p>now</p></h3>
<p>Return array, $array[1] - current layout name, $array[2] - current page name.</p>
<br>

<h3><p>loadPage</p></h3>
<p>Return URL of page content according current position.</p>
<br>

<h3><p>id</p></h3>
<p>Return current page ID.</p>
<br>

<h3><p>loadPart</p></h3>
<p>Return URL of file from /resourses/parts/. Requare name of file, exsample: $red->nav->loadPart('menu'). </p>
<br>

<h3><p>redirect</p></h3>
<p>Redirecting user to specified page from /resourses/pages/. Requare name of page, exsample: $red->nav->redirect('page').</p>
<br>

<h3><p>link</p></h3>
<p>Return URL of specified page from /resourses/pages/. Requare name of page, exsample: $red->nav->link('page').</p>
<br>

<div class="line"></div>
<h2><p>Class "HTML"</p></h2>
<b><p>Calling:</b> $red->html->method();</p>
<b><p>Methods:</b> title, charset, field,  components, read, createForm, endForm.</p>
<br>

<h3><p>title</p></h3>
<p>Set title of page. If parameter not seted, use page name as title.</p>
<br>

<h3><p>charset</p></h3>
<p>Set charset of page. Requare charset name, exsample: $red->html->charset("utf-8").</p>
<br>

<div class="line"></div>
<h2><p>Class "MySQL"</p></h2>
<b><p>Calling:</b> $red->sql->method();</p>
<b><p>Methods:</b> check_MySQL, check_database, host, name, login, pass, settings.</p>