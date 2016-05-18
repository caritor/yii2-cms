<?php

use yii\db\Migration;

/**
 * Handles the creation for table `m_cms_menu`.
 * Has foreign keys to the tables:
 *
 * - `cms_pages`
 * - `m_cms_menu`
 * - `m_cms_menu_area`
 * - `user`
 */
class m160517_074147_create_m_cms_menu extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('m_cms_menu', [
            'menu_id' => $this->primaryKey(),
            'page_id' => $this->integer()->notNull(),
            'parent_menu_id' => $this->integer()->defaultValue(NULL),
            'area_id' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull(),
            'updated_at' => $this->timestamp()->notNull(),
            'sort_order' => $this->integer()->notNull()->defaultValue(0),
        ]);

        // creates index for column `page_id`
        $this->createIndex(
            'idx-m_cms_menu-page_id',
            'm_cms_menu',
            'page_id'
        );

        // add foreign key for table `cms_pages`
        $this->addForeignKey(
            'fk-m_cms_menu-page_id',
            'm_cms_menu',
            'page_id',
            'cms_pages',
            'page_id',
            'CASCADE'
        );

        // creates index for column `parent_menu_id`
        $this->createIndex(
            'idx-m_cms_menu-parent_menu_id',
            'm_cms_menu',
            'parent_menu_id'
        );

        // add foreign key for table `m_cms_menu`
        $this->addForeignKey(
            'fk-m_cms_menu-parent_menu_id',
            'm_cms_menu',
            'parent_menu_id',
            'm_cms_menu',
            'menu_id',
            'CASCADE'
        );

        // creates index for column `area_id`
        $this->createIndex(
            'idx-m_cms_menu-area_id',
            'm_cms_menu',
            'area_id'
        );

        // add foreign key for table `m_cms_menu_area`
        $this->addForeignKey(
            'fk-m_cms_menu-area_id',
            'm_cms_menu',
            'area_id',
            'm_cms_menu_area',
            'area_id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            'idx-m_cms_menu-created_by',
            'm_cms_menu',
            'created_by'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-m_cms_menu-created_by',
            'm_cms_menu',
            'created_by',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `cms_pages`
        $this->dropForeignKey(
            'fk-m_cms_menu-page_id',
            'm_cms_menu'
        );

        // drops index for column `page_id`
        $this->dropIndex(
            'idx-m_cms_menu-page_id',
            'm_cms_menu'
        );

        // drops foreign key for table `m_cms_menu`
        $this->dropForeignKey(
            'fk-m_cms_menu-parent_menu_id',
            'm_cms_menu'
        );

        // drops index for column `parent_menu_id`
        $this->dropIndex(
            'idx-m_cms_menu-parent_menu_id',
            'm_cms_menu'
        );

        // drops foreign key for table `m_cms_menu_area`
        $this->dropForeignKey(
            'fk-m_cms_menu-area_id',
            'm_cms_menu'
        );

        // drops index for column `area_id`
        $this->dropIndex(
            'idx-m_cms_menu-area_id',
            'm_cms_menu'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-m_cms_menu-created_by',
            'm_cms_menu'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            'idx-m_cms_menu-created_by',
            'm_cms_menu'
        );

        $this->dropTable('m_cms_menu');
    }
}
