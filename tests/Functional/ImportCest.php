<?php 

class ImportCest
{
    // tests
    public function iShouldImportVideos(FunctionalTester $I)
    {
        $I->runShellCommand(__DIR__.'/../../bin/import flub', false);
        $I->seeShellOutputMatches('@^(?:http://)?([^/]+)@i');
    }
    
    /**
     * @test
     */
    public function iShouldThrowLocalResourceNotFoundException(FunctionalTester $I)
    {
        $I->runShellCommand(__DIR__.'/../../bin/import invalidSource  2>&1', false);
        $I->seeShellOutputMatches('/LocalResourceNotFoundException/i');
    }
}
