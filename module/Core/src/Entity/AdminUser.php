<?php
declare(strict_types = 1);

namespace Core\Entity;

/**
 * Admin User
 *
 * @package Core\Entity
 */
class AdminUser extends AbstractEntity
{
    /**
     * Acl role user
     */
    const ROLE_USER = 'user';

    /**
     * Acl role admin
     */
    const ROLE_ADMIN = 'admin';

    /**
     * The status enabled
     */
    const STATUS_ENABLED = 'enabled';

    /**
     * The status disabled
     */
    const STATUS_DISABLED = 'disabled';

    /**
     * Acl role list
     */
    const ROLE_LIST = [
        self::ROLE_USER,
        self::ROLE_ADMIN
    ];

    /**
     * Admin user status list
     */
    const STATUS_LIST = [
        self::STATUS_ENABLED,
        self::STATUS_DISABLED
    ];

    /**
     * Member fields
     *
     * @var array
     */
    protected $fields = [
        'id' => null,
        'username' => null,
        'password' => null,
        'email' => null,
        'first_name' => null,
        'last_name' => null,
        'role' => null,
        'status' => null,
        'fb_id' => null,
        'fb_token' => null,
        'fb_picture_url' => null,
        'fb_is_active' => null,
        'updated' => null
    ];

    /**
     * Returns id
     *
     * @return int
     */
    public function getId() : int
    {
        return (int)$this->fields['id'];
    }

    /**
     * Sets the id
     *
     * @param int $value
     * @return void
     */
    public function setId(int $value)
    {
        $this->fields['id'] = (int)$value;
    }

    /**
     * Returns username
     *
     * @return string
     */
    public function getUsername() : string
    {
        return (string)$this->fields['username'];
    }

    /**
     * Sets the username
     *
     * @param string $value
     * @return void
     */
    public function setUsername(string $value)
    {
        $this->fields['username'] = (string)$value;
    }

    /**
     * Returns password
     *
     * @return string
     */
    public function getPassword() : string
    {
        return (string)$this->fields['password'];
    }

    /**
     * Sets the password
     *
     * @param string $value
     * @return void
     */
    public function setPassword(string $value)
    {
        $this->fields['password'] = (string)password_hash($value, PASSWORD_BCRYPT);
    }

    /**
     * Returns email
     *
     * @return string
     */
    public function getEmail() : string
    {
        return (string)$this->fields['email'];
    }

    /**
     * Sets the email
     *
     * @param string $value
     * @return void
     */
    public function setEmail(string $value)
    {
        $this->fields['email'] = (string)$value;
    }

    /**
     * Returns first name
     *
     * @return string
     */
    public function getFirstName() : string
    {
        return (string)$this->fields['first_name'];
    }

    /**
     * Sets the first name
     *
     * @param string $value
     * @return void
     */
    public function setFirstName(string $value)
    {
        $this->fields['first_name'] = (string)$value;
    }

    /**
     * Returns last name
     *
     * @return string
     */
    public function getLastName() : string
    {
        return (string)$this->fields['last_name'];
    }

    /**
     * Sets the last name
     *
     * @param string $value
     * @return void
     */
    public function setLastName(string $value)
    {
        $this->fields['last_name'] = (string)$value;
    }

    /**
     * Returns role
     *
     * @return string
     */
    public function getRole() : string
    {
        return (string)$this->fields['role'];
    }

    /**
     * Sets the role
     *
     * @param string $value
     * @return void
     */
    public function setRole(string $value)
    {
        if (!in_array($value, self::ROLE_LIST, true)) {
            throw new \InvalidArgumentException('Given user role (' . $value . ') is not valid');
        }
        $this->fields['role'] = (string)$value;
    }

    /**
     * Returns status
     *
     * @return string
     */
    public function getStatus() : string
    {
        return (string)$this->fields['status'];
    }

    /**
     * Sets the status
     *
     * @param string $value
     * @return void
     */
    public function setStatus(string $value)
    {
        if (!in_array($value, self::STATUS_LIST, true)) {
            throw new \InvalidArgumentException('Given status (' . $value . ') is not valid');
        }
        $this->fields['status'] = (string)$value;
    }

    /**
     * Set is active
     *
     * @param bool $value
     */
    public function setFbIsActive(bool $value)
    {
        $this->fields['fb_is_active'] = (int)$value;
    }

    /**
     * Returns if is active
     *
     * @return bool
     */
    public function isFbActive()
    {
        return $this->fields['fb_is_active'] === 1;
    }

    /**
     * Sets facebook token
     *
     * @param string $value
     */
    public function setFbToken(string $value)
    {
        $this->fields['fb_token'] = $value;
    }

    /**
     * Returns the facebook token
     *
     * @return string
     */
    public function getFbToken() : string
    {
        return $this->fields['fb_token'];
    }

    /**
     * Set facebook id
     *
     * @param int $value
     */
    public function setFbId(int $value)
    {
        $this->fields['fb_id'] = $value;
    }

    /**
     * Returns the facebook id
     *
     * @return int|null
     */
    public function getFbId()
    {
        return $this->fields['fb_id'];
    }

    /**
     * Sets facebook picture url
     *
     * @param string $value
     */
    public function setFbPictureUrl(string $value)
    {
        $this->fields['fb_picture_url'] = $value;
    }

    /**
     * Returns facebook picture url
     * 
     * @return string|null
     */
    public function getFbPictureUrl()
    {
        return $this->fields['fb_picture_url'];
    }
}