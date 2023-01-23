<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Fb extends CI_Controller{

	function __construct()
    {
        parent::__construct();
    }
	
	function index()
    {

        $fb_config = array(
            'appId'  => '465756010218319',
            'secret' => 'dd91b0c4044cf61a7359afca305f5ea1'
        );

        $this->load->library('facebook', $fb_config);

        $user = $this->facebook->getUser();

        if ($user) {
            try {
                $data['user_profile'] = $this->facebook
                    ->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }

        if ($user) {
            $data['logout_url'] = $this->facebook
                ->getLogoutUrl();
        } else {
            $data['login_url'] = $this->facebook
                ->getLoginUrl();
        }

        $this->load->view('fb',$data);
    }

	
}