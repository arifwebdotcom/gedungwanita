<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\Agama;
use App\Models\SuplierPakan;
use App\Models\Asosiasi;
use App\Models\Invoice;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    protected $suplier;
    protected $asosiasi;
    protected $datainvoice;
    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['auth', 'number', 'app_helper'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */

    protected $dataglobal;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
       
        $this->suplier = model(SuplierPakan::class)
        ->select('*')
        ->findAll(); 

        $this->data['datainvoice'] = model(Invoice::class)
        ->select('*')
        ->findAll(); 

        $this->asosiasi = model(Asosiasi::class)
        ->select('asosiasi_m.*,count(users.id) as jumlah')
        ->join('users','users.asosiasifk=asosiasi_m.id')
        ->groupby('users.asosiasifk')
        ->findAll(); 
        // $this->suplier['suplier'] = model(SuplierPakan::class)
        // ->select('*')
        // ->findAll();
        //print_r($this->agama);
        

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
}
