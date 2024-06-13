<?php 

class ExtendedWebUser extends CWebUser {

        // Additional user attributes you want to access
        private $_model;
        
        /**
         * Loads the Account model based on the user ID stored in the session.
         * Caches the model for performance reasons.
         * 
         * @return Account model or null if not found
         */
        public function getUserModel() {
        if ($this->isGuest) {
            return null;
        }
        
        if ($this->_model === null) {
            $this->_model = Account::model()->findByPk($this->id);
        }
        
        return $this->_model;
        }
    
        /**
         * Checks if the user has a specific role based on the User model's role attribute.
         * 
         * @param string $role The role to check
         * @return bool Whether the user has the specified role
         */
        public function hasRole($role) {
        $user = $this->getUserModel();
        return $user !== null && $user->role === $role;
        }
    
        /**
         * Example method to get a specific user attribute from the model.
         * You can add similar methods for other attributes you need.
         * 
         * @return string User's email address (replace with your attribute name)
         */
        public function getAccount() {
        $user = $this->getUserModel();
        return $user !== null ? $user : null;
        }
    }
