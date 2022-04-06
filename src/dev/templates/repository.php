<?php

namespace NSPACERepositories\FOLDER;

use Gomee\Repositories\BaseRepository;
/**
 * validator 
 * 
 */
use NSPACEValidators\FOLDER\NAMEValidator;
use NSPACEMasks\FOLDER\MODELMask;
use NSPACEMasks\FOLDER\MODELCollection;
class NAMERepository extends BaseRepository
{
    /**
     * class chứ các phương thức để validate dử liệu
     * @var string $validatorClass 
     */
    protected $validatorClass = NAMEValidator::class;
    /**
     * tên class mặt nạ. Thường có tiền tố [tên thư mục] + \ vá hậu tố Mask
     *
     * @var string
     */
    protected $maskClass = MODELMask::class;

    /**
     * tên collection mặt nạ
     *
     * @var string
     */
    protected $maskCollectionClass = MODELCollection::class;

    /**
     * @var \App\Models\MODEL
     */
    static $__Model__;

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\MODEL::class;
    }

}