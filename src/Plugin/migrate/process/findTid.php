<?php
namespace Drupal\boydmigrate\Plugin\migrate\process;

use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * Find taxonomy term id process pipeline
 *
 * @MigrateProcessPlugin(
 *   id = "find_tid"
 * )
 * 
 *  To find tid transformations use the following:
 *
 * @code
 * field_name/target_id:
 *   plugin: find_tid
 *   source: string
 * @endcode
 *
 */
class FindTid extends ProcessPluginBase {

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
    $path = \Drupal::service('path.alias_manager')->getPathByAlias($value);
    $explode = explode('/',$path);
    $tid = $explode[3];

    return $tid;
  }

}