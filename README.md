# evolve_web

CONTENTS OF THIS FILE
---------------------

 * About This Module
 * How It Works
 * Setup
 

About This Module
---------------------
  This module was used to replace node_revision_delete module. The module was ideal for smaller sites, but when it came to larger sites the node revision removal process in both configuration and processing of each node was so heavy it would take the site down in Development and TEST environments.

  Module was made with specific configurations that can run in the background without causing a system fault or a WSOD.

  https://www.drupal.org/project/node_revision_delete/issues/3115952

How It Works
---------------------
  Revision delete functions by finding first 5 Node IDs that have more than 100 revisions. Gets up to 5000 revisions at a time (Max 25,000). Using queue (referenced in QueueWorkerRevisionDelete.php) combined with Cron a queue is created and the node revisions are deleted via QueueWorkerRevisionDelete.
  


Setup
---------------------

  1. Enable this module
  2. Enable Cron UI/ Ultimate Cron
  3. Set Interval no less than 15 minutes.

