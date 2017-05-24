<?php

/*
 * This file is part of the Vultr PHP library.
 *
 * (c) Albert Leitato <wizqydy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
     * @see https://www.vultr.com/api/#backup_backup_list
     *
     * @return BackupEntity
     *
     * @param int    $sub_id    Filter result set to only contain backups of this subscription object
     * @param string $backup_id filter result set to only contain this backup
     */
    public function list($subid = null, $backup_id = null)
    {
        $backups = $this->adapter->get(sprintf('%s/backup/list?SUBID=%d&BACKUPID=%s', $this->endpoint, $subid, $backup_id));

        $backups = json_decode($backups, true);
        return array_map(function ($backup) {
            return new BackupEntity($backup);
        }, $backups);
    }
}
