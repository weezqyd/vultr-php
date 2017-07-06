<?php
/*
 *   This file is part of the Vultr PHP library.
 *
 *   (c) Albert Leitato <wizqydy@gmail.com>
 *
 *   For the full copyright and license information, please view the LICENSE
 *   file that was distributed with this source code.
 */
namespace Vultr\Api;

use Vultr\Entity\Backup as BackupEntity;

/**
 * @author Albert Leitato <wizqydy@gmail.com>
 */
class Backup extends AbstractApi
{
    /**
     * List all backups on the current account.
     *
     * @param int    $sub_id    Filter result set to only contain backups of this subscription object
     * @param string $backup_id filter result set to only contain this backup
     * 
     * @return BackupEntity
     */
    public function list($subId = null, $backupId = null)
    {
        $backups = $this->adapter->get(\sprintf('%s/backup/list?SUBID=%d&BACKUPID=%s', $this->endpoint, $subId, $backupId));

        return $this->handleResponse($backups, BackupEntity::class, true);
    }
}
