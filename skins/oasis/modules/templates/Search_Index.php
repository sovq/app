<?php $searchterm = isset($searchterm) ? $searchterm : ''; ?>

<form id="WikiaSearch" class="WikiaSearch<?= empty($noautocomplete) ? '' : ' noautocomplete' ?>" action="<?= $specialSearchUrl; ?>" method="get">
	<input type="text" name="search" placeholder="<?= $placeholder ?>" autocomplete="off" accesskey="f" value="<?= htmlspecialchars( $searchterm ) ?>">
	<input type="hidden" name="fulltext" value="<?= $fulltext ?>">
	<input type="submit">
	<button class="wikia-button"><img src="<?= $wg->BlankImgUrl ?>" class="sprite search" height="17" width="21"></button>
</form>
<?php
if ((!$wg->WikiaSearchIsDefault) && $wg->Title->isSpecial('Search')) {
	if( $isCrossWikiaSearch ) {
		echo Xml::element('h1', array(), wfMsg('oasis-search-results-from-all-wikis'));
	}
	else {
		echo Xml::element('h1', array(), wfMsg('oasis-search-results-from', $wg->Sitename));
	}
}
?>
