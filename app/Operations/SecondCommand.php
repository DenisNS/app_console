<?php
namespace App\Operations;
use DenisNS\Commands\AbstractCommand;

/**
 * Пользовательская команда
 */
class SecondCommand extends AbstractCommand
{
    // Определение параметров команды
    protected string $description = "For call command enter: php command.php second_command {argument} {argument1,argument2} [option=value] [option2={valuee1,value2}]\r\n";
    protected string $command = 'second_command';
    protected array $arguments = ['no-force','force','up', 'down'];
    protected array $options = [
        'group' => ['id', 'name'],
        'limit' => ['10', '20', '30']
    ];

    /**
     * Обработчик команды
     * @return void
     */
    public function run()
    {
        $all_options = $this->getOption();
        $all_argumnts = $this->getArgument();

        foreach ($this->arguments as $argument) {
            if ($this->getArgument($argument)) {
                echo "Yes command have argument $argument \r\n";
                // to do something
            }
        }

        foreach ($this->options as $option) {
            if ($this->getOption($option)) {
                echo "Yes command have option $option with value(s): ".
                    implode(', ',$this->getOption($option)). "\r\n";
                // to do something
            }
        }
    }
}