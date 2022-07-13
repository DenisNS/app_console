<?php
use DenisNS\Commands\Listen;
use DenisNS\Commands\Traits\Helper;


require __DIR__ . '/vendor/autoload.php';

if (count($argv) > 1) {
    $listen = new Listen($argv);
    $commandName = OPERATIONS_NAMESPACE .$listen->getCommandName();
    $signature = $listen->getSignature();

    $command = new $commandName($signature);
    $command->run();
} else {
    (new class { use Helper; })::showHelpMessage(OPERATIONS_DIR, OPERATIONS_NAMESPACE);

}

