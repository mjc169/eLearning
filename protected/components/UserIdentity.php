<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate() {
		$account = Account::model()->findByAttributes(array('username' => $this->username));
	
		if ($account === null) {
		  $this->errorCode=self::ERROR_USERNAME_INVALID;
		} else if (!password_verify($this->password.$account->salt, $account->password)) { // Assuming password stored as hash
		  $this->errorCode=self::ERROR_PASSWORD_INVALID;
		} else {
		  $this->errorCode=self::ERROR_NONE;
		  $this->setState('id', $account->id); // Set user ID for later access
		  $this->username = $account->username; // Update username for clarity (optional)
		}
		return !$this->errorCode;
	  }
}