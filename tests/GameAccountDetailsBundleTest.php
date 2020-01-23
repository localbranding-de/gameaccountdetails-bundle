<?php

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace LocalbrandingDe\GameAccountDetailsBundle\Tests;

use LocalbrandingDe\GameAccountDetailsBundle\GameAccountDetailsBundle;
use PHPUnit\Framework\TestCase;

class MembershiplevelsBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new GameAccountDetailsBundle();

        $this->assertInstanceOf('Localbranding-de\GameAccountDetailsBundle\GameAccountDetailsBundle', $bundle);
    }
}
