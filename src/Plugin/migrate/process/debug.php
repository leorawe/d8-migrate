<?php
namespace Drupal\boydmigrate\Plugin\migrate\process;

use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * Debug process pipeline
 *
 * @MigrateProcessPlugin(
 *   id = "debug"
 * )
 */
class Debug extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    echo "DEBUG: " . $this->configuration['message'] . "\n";
    print_r(['value' => $value]);
    if (!empty($this->configuration['row']) &&
        $this->configuration['row']) {
      print_r(['row' => $row]);
    }
    return $value;
  }

}