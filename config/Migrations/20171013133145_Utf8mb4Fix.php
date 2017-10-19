<?php

use Cake\Error\Debugger;
use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

class Utf8mb4Fix extends AbstractMigration {

	/**
	 * Change Method.
	 *
	 * Write your reversible migrations using this method.
	 *
	 * More information on writing migrations is available here:
	 * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
	 *
	 * @return void
	 */
	public function change() {
		$table = $this->table('queue_processes');
		$table->changeColumn('pid', 'string', [
			'encoding' => 'ascii',
			'collation' => 'ascii_general_ci',
		]);

		$table = $this->table('queued_jobs');
		$table->changeColumn('job_type', 'string', [
			'encoding' => 'utf8mb4',
			'collation' => 'utf8mb4_unicode_ci',
		]);
		$table->changeColumn('data', 'text', [
			'limit' => MysqlAdapter::TEXT_MEDIUM,
			'null' => true,
			'default' => null,
			'encoding' => 'utf8mb4',
			'collation' => 'utf8mb4_unicode_ci',
		]);
		$table->changeColumn('job_group', 'string', [
			'null' => true,
			'default' => null,
			'encoding' => 'utf8mb4',
			'collation' => 'utf8mb4_unicode_ci',
		]);
		$table->changeColumn('reference', 'string', [
			'null' => true,
			'default' => null,
			'encoding' => 'utf8mb4',
			'collation' => 'utf8mb4_unicode_ci',
		]);
		$table->changeColumn('failure_message', 'text', [
			'limit' => MysqlAdapter::TEXT_MEDIUM,
			'null' => true,
			'default' => null,
			'encoding' => 'utf8mb4',
			'collation' => 'utf8mb4_unicode_ci',
		]);
		$table->changeColumn('workerkey', 'string', [
			'null' => true,
			'default' => null,
			'encoding' => 'utf8mb4',
			'collation' => 'utf8mb4_unicode_ci',
		]);
		$table->changeColumn('status', 'string', [
			'null' => true,
			'default' => null,
			'encoding' => 'utf8mb4',
			'collation' => 'utf8mb4_unicode_ci',
		]);
	}

}