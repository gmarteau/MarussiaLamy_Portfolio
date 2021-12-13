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
]);
$maxIndex = count($otherSkills) - 1;
$firstIndex = rand(0, $maxIndex);
while (($secondIndex = rand(0, $maxIndex)) === $firstIndex);
$firstDifferentSkill = $otherSkills[$firstIndex];
$secondDifferentSkill = $otherSkills[$secondIndex];