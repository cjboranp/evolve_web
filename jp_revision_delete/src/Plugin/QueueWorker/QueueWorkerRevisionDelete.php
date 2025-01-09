<?php

namespace Drupal\jp_revision_delete\Plugin\QueueWorker;

/**
 * @file
 * Contains \Drupal\jp_revision_delete\Plugin\QueueWorker\QueueWorkerRevisionDelete
 */

use Drupal\Core\Annotation\QueueWorker;
use Drupal\Core\Queue\QueueWorkerBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;

/**
 * QueueWorkerRevisionDelete Loads an item and destroys a revision set for clean up. 
 * QueueWorkerRevisionDelete works best with individual calls. Before It was organized as a single node
 * iterating through deletable revisions, but even that was crashing.
 *
 * @QueueWorker(
 *   id = "jp_revision_delete",
 *   title = @Translation("jp - Delete Node Revisions"),
 *   cron = {"time" = 900}
 * )
 */
class QueueWorkerRevisionDelete extends QueueWorkerBase {
  public function processItem($items) {
      $node = null;
      $node_storage = \Drupal::entityTypeManager()->getStorage('node');
      $node = $node_storage->load($items['nid']);
      \Drupal::entityTypeManager()->getStorage('node')->deleteRevision($items['vid']);
  }
}
