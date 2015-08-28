<?php

namespace common\models\cms;

use Yii;

/**
 * This is the model class for table "{{%cms_img}}".
 *
 * @property string $id
 * @property integer $cms_class_id
 * @property string $title
 * @property string $colorval
 * @property string $boldval
 * @property string $flag
 * @property string $source
 * @property string $author
 * @property string $link_url
 * @property string $keywords
 * @property string $description
 * @property string $content
 * @property string $pic_url
 * @property string $picarr
 * @property string $hits
 * @property string $order
 * @property integer $status
 * @property string $updated_at
 * @property string $created_at
 */
class CmsImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cms_img}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cms_class_id', 'hits', 'order', 'status', 'updated_at', 'created_at'], 'integer'],
            [['title', 'colorval', 'boldval', 'flag', 'source', 'author', 'keywords', 'description', 'content', 'picarr', 'hits'], 'required'],
            [['content', 'picarr'], 'string'],
            [['title'], 'string', 'max' => 80],
            [['colorval', 'boldval'], 'string', 'max' => 10],
            [['flag'], 'string', 'max' => 30],
            [['source', 'author', 'keywords'], 'string', 'max' => 50],
            [['link_url', 'description'], 'string', 'max' => 255],
            [['pic_url'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cms', 'ID'),
            'cms_class_id' => Yii::t('cms', 'Cms Class ID'),
            'title' => Yii::t('cms', 'Title'),
            'colorval' => Yii::t('cms', 'Colorval'),
            'boldval' => Yii::t('cms', 'Boldval'),
            'flag' => Yii::t('cms', 'Flag'),
            'source' => Yii::t('cms', 'Source'),
            'author' => Yii::t('cms', 'Author'),
            'link_url' => Yii::t('cms', 'Link Url'),
            'keywords' => Yii::t('cms', 'Keywords'),
            'description' => Yii::t('cms', 'Description'),
            'content' => Yii::t('cms', 'Content'),
            'pic_url' => Yii::t('cms', 'Pic Url'),
            'picarr' => Yii::t('cms', 'Picarr'),
            'hits' => Yii::t('cms', 'Hits'),
            'order' => Yii::t('cms', 'Order'),
            'status' => Yii::t('cms', 'Status'),
            'updated_at' => Yii::t('cms', 'Updated At'),
            'created_at' => Yii::t('cms', 'Created At'),
        ];
    }
    
    /**
     * 一对一
     */
    public function getCmsClass()
    {
        return $this->hasOne(CmsClass::className(), ['id' => 'cms_class_id']);
    }

    /**
     * @inheritdoc
     * @return CmsImgQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CmsImgQuery(get_called_class());
    }
}
