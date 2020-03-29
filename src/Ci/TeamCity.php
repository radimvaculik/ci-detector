<?php declare(strict_types=1);

namespace OndraM\CiDetector\Ci;

use OndraM\CiDetector\CiDetector;
use OndraM\CiDetector\TrinaryLogic;

class TeamCity extends AbstractCi
{
    public function isDetected(): bool
    {
        return $this->env->get('TEAMCITY_VERSION') !== false;
    }

    public function getCiName(): string
    {
        return CiDetector::CI_TEAMCITY;
    }

    public function isPullRequest(): TrinaryLogic
    {
        return TrinaryLogic::createMaybe();
    }

    public function getBuildNumber(): string
    {
        return $this->env->getString('BUILD_NUMBER');
    }

    public function getBuildUrl(): string
    {
        return ''; // unsupported
    }

    public function getGitCommit(): string
    {
        return $this->env->getString('BUILD_VCS_NUMBER');
    }

    public function getGitBranch(): string
    {
        return ''; // unsupported
    }

    public function getRepositoryName(): string
    {
        return ''; // unsupported
    }

    public function getRepositoryUrl(): string
    {
        return ''; // unsupported
    }
}
