<?php

include_once('phpGitHubApi.php');

$github = new phpGitHubApi();

$repos = $github->getRepoApi()->getUserRepos('abtris');

$out.="";

foreach ($repos as $r) {
	if ($r['name']!='abtris.github.com') {
	
	$out.= "<div class='repo'>
					<h2><a href='{$r['url']}'>{$r['name']}</a></h2>
					<p>{$r['description']}</p>
				</div>";
	}
	
}

$template = file_get_contents('template.html');


$output = str_replace("##REPOS##", $out, $template);

file_put_contents('index.html', $output);