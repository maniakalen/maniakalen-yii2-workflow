<?php
/**
 * PHP Version 5.5
 *
 *  $DESCRIPTION$ $END$
 *
 * @category $Category$ $END$
 * @package  $Package$ $END$
 * @author   Peter Georgiev <peter.georgiev@concatel.com>
 * @license  GNU GENERAL PUBLIC LICENSE https://www.gnu.org/licenses/gpl.html
 * @link     $LINK$ $END$
 */

class m171030_115200_create_steps extends \yii\db\Migration
{
    public function up()
    {
        $this->createTable('workflow_step_restrictions', [
            'id' => $this->primaryKey(),
            'step_id' => $this->integer()->null(),
            'restriction_type' => "ENUM('callback', 'field')",
            'restriction' => $this->text(),
            'comparison' => "ENUM('>', '<', '=', '!=')",
            'value' => $this->string(),
            'grouping_hash' => $this->string(50)
        ]);
        $this->addForeignKey(
            'fk-workflow_rest_steps-step_id',
            'workflow_step_restrictions',
            'step_id',
            'workflow_steps',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropTable('workflow_step_restrictions');
    }
}