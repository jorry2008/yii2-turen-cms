<?php

namespace common\models\cms;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\cms\CmsPage;

/**
 * CmsPageSearch represents the model behind the search form about `common\models\cms\CmsPage`.
 */
class CmsPageSearch extends CmsPage
{
	const MAX_PAGE_SIZE = 20;
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order', 'status', 'updated_at', 'created_at'], 'integer'],
            [['pic_url', 'cms_class_id', 'content'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CmsPage::find()->alive();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        	'pagination' => [
        		//'pageSize' => static::MAX_PAGE_SIZE,
        	],
        	'sort' => [
        		'defaultOrder' => [
        			'order' => SORT_ASC
        		],
        	],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'cms_class_id' => $this->cms_class_id,
            'order' => $this->order,
            'status' => $this->status,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'pic_url', $this->pic_url])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
