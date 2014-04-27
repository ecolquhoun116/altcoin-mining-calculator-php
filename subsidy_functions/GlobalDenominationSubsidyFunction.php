<?php

namespace n00bsys0p;

require_once(APP_DIR . '/subsidy_functions/interfaces/SubsidyFunctionInterface.php');

/**
 * Logicoin subsidy function
 */
class GlobalDenominationSubsidyFunction implements SubsidyFunctionInterface
{
    /**
     * GlobalDenomination's subsidy function ported from GetBlockValue
     *
     * @param  integer $nHeight The block height for which to find the subsidy
     * @param  integer $dDiff   The given block's difficulty
     * @return float
     */
    public function getBlockValue($nHeight, $dDiff)
    {
        $nSubsidy = 40;

        if ($nHeight == 1)
        {
           $nSubsidy = 28000;
           return $nSubsidy;
        }
        else if ($nHeight <= 10)
        {
           $nSubsidy = 1;
           return $nSubsidy;
        }

        // Subsidy is cut in half every 700,000 blocks
        $nSubsidy >>= ($nHeight / 700000);

        return $nSubsidy;
    }
}
