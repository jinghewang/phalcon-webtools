<?php

class RiderUserModel extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=18, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $mobile;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $name;

    /**
     *
     * @var integer
     * @Column(type="integer", length=18, nullable=true)
     */
    public $rider_company_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=18, nullable=true)
     */
    public $rider_site_id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $idcard_img;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $health_img;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $status;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $is_delete;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    public $create_time;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $longitude;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $latitude;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    public $update_time;

    /**
     *
     * @var string
     * @Column(type="string", length=32, nullable=true)
     */
    public $password;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("hbd_lz");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'rp_rider_user';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return RiderUserModel[]|RiderUserModel
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return RiderUserModel
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
