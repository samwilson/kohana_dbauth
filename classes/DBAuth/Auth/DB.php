<?php
/**
 * Database Auth driver to authenticate as a database user.
 *
 * @package  DBAuth
 * @category Auth
 * @author   Sam Wilson
 * @license  MIT
 * @link     http://github.com/samwilson/kohana_dbauth
 */
class DBAuth_Auth_DB extends Auth
{

	/** @var string The key under which the password is stored. */
	private $_db_password_session_key;

	/**
	 * Loads Session and configuration options.
	 *
	 * @param   array  $config  Config Options
	 * @return  void
	 */
	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->_db_password_session_key = $this->_config['session_key'].'_dbpass';
	}

	/**
	 * Log in with a given username and password.
	 *
	 * @param string $username
	 * @param string $password
	 * @param void   $remember NOT USED
	 */
	protected function _login($username, $password, $remember)
	{
		$config = Kohana::$config->load('database')->default;
		$config['connection']['username'] = $username;
		$config['connection']['password'] = $password;
		try {
			// Connect
			Database::instance('dbauth', $config)->connect(); //->query(Database::SELECT, 'SELECT 1');
			// Save password
			$this->_session->set($this->_db_password_session_key, $password);
			// Finish loggin in
			return $this->complete_login($username);
		} catch (Database_Exception $e) {
			// Log in failed
			// @TODO Make sure that it's an 'access denied' exception.
			return FALSE;
		}
	}

	/**
	 * Get the password for the currently logged in user.
	 * 
	 * @param string $username NOT USED
	 * @return null|string The password, or NULL if the user has not logged in.
	 */
	public function password($username)
	{
		return $this->_session->get($this->_db_password_session_key);
	}

	/**
	 * Check a given password against the stored one.
	 *
	 * @param string $password
	 * @return boolean
	 */
	public function check_password($password)
	{
		return $password == $this->password(NULL);
	}

}
