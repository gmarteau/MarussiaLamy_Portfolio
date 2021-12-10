<?php
$title = '';
$currentSkillId = 0;
$skills = get_terms(['taxonomy' => 'skill']);
foreach ($skills as $skill) {
    $isTaxArchive = is_tax('skill', $skill->slug);
    if ($isTaxArchive) {
        $title = $skill->name;
        $currentSkillId = $skill->term_id;
    }
}
$otherSkills = get_terms([
    'taxonomy' => 'skill',
    'exclude' => $currentSkillId,
    'number' => 2
]);
$firstDifferentSkill = $otherSkills[0];
$secondDifferentSkill = $otherSkills[1];