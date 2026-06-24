<?php

namespace App\Constants;

class NotificationConstants
{
    // 📢 Social Interaction
    public const LIKE            = 'like';
    public const COMMENT         = 'comment';
    public const REPLY           = 'reply';
    public const FOLLOW          = 'follow';
    public const MENTION         = 'mention';
    public const TAG             = 'tag';
    public const SHARE           = 'share';
    public const REPOST          = 'repost';
    public const SAVE            = 'save';
    public const STORY_VIEW      = 'story-view';
    public const STORY_REACT     = 'story-react';
    public const STORY_REPLY     = 'story-reply';
    public const REACTION        = 'reaction';
    public const POLL_VOTE       = 'poll-vote';
    public const POLL_CREATED    = 'poll-created';
    public const EVENT_INVITE    = 'event-invite';
    public const EVENT_REMINDER  = 'event-reminder';
    public const LIVE_START      = 'live-start';
    public const LIVE_INVITE     = 'live-invite';
    public const LIVE_COMMENT    = 'live-comment';

    // 📩 Messaging & Groups
    public const MESSAGE         = 'message';
    public const MESSAGE_REACT   = 'message-react';
    public const GROUP_INVITE    = 'group-invite';
    public const GROUP_MENTION   = 'group-mention';
    public const GROUP_CREATED   = 'group-created';
    public const CALL_INCOMING   = 'call-incoming';
    public const CALL_MISSED     = 'call-missed';
    public const CALL_ENDED      = 'call-ended';
    public const VOICE_MESSAGE   = 'voice-message';

    // 🎥 Media & Content
    public const VIDEO_UPLOAD    = 'video-upload';
    public const VIDEO_COMMENT   = 'video-comment';
    public const BROADCAST       = 'broadcast';
    public const CHANNEL_UPDATE  = 'channel-update';

    // 💼 Professional / Job-related
    public const JOB_POSTED          = 'job-posted';
    public const JOB_APPLY           = 'job-apply';
    public const JOB_INVITE          = 'job-invite';
    public const JOB_STATUS          = 'job-status';
    public const CONNECTION_REQUEST  = 'connection-request';
    public const CONNECTION_ACCEPT   = 'connection-accept';
    public const RECOMMENDATION      = 'recommendation';
    public const ENDORSEMENT         = 'endorsement';

    // 💳 Payment & E-commerce
    public const PAYMENT_SUCCESS     = 'payment-success';
    public const PAYMENT_FAILED      = 'payment-failed';
    public const PAYMENT_REFUNDED    = 'payment-refunded';
    public const SUBSCRIPTION_START  = 'subscription-start';
    public const SUBSCRIPTION_END    = 'subscription-end';
    public const SUBSCRIPTION_RENEW  = 'subscription-renew';
    public const ORDER_PLACED        = 'order-placed';
    public const ORDER_SHIPPED       = 'order-shipped';
    public const ORDER_DELIVERED     = 'order-delivered';
    public const ORDER_CANCELLED     = 'order-cancelled';

    // ⚙️ System & Admin
    public const SYSTEM_ALERT        = 'system-alert';
    public const POLICY_UPDATE       = 'policy-update';
    public const SECURITY_ALERT      = 'security-alert';
    public const ACCOUNT_VERIFIED    = 'account-verified';
    public const ACCOUNT_WARNING     = 'account-warning';
    public const ACCOUNT_DEACTIVATED = 'account-deactivated';
    public const ACCOUNT_DELETED     = 'account-deleted';

    // 🏆 Engagement / Gamification
    public const BADGE_AWARDED       = 'badge-awarded';
    public const LEVEL_UP            = 'level-up';
    public const STREAK_REMINDER     = 'streak-reminder';
    public const ACHIEVEMENT_UNLOCKED = 'achievement-unlocked';
    public const LEADERBOARD_UPDATE  = 'leaderboard-update';

    public static function allTypes(): array
    {
        return [
            // Social
            self::LIKE,
            self::COMMENT,
            self::REPLY,
            self::FOLLOW,
            self::MENTION,
            self::TAG,
            self::SHARE,
            self::REPOST,
            self::SAVE,
            self::STORY_VIEW,
            self::STORY_REACT,
            self::STORY_REPLY,
            self::REACTION,
            self::POLL_VOTE,
            self::POLL_CREATED,
            self::EVENT_INVITE,
            self::EVENT_REMINDER,
            self::LIVE_START,
            self::LIVE_INVITE,
            self::LIVE_COMMENT,

            // Messaging
            self::MESSAGE,
            self::MESSAGE_REACT,
            self::GROUP_INVITE,
            self::GROUP_MENTION,
            self::GROUP_CREATED,
            self::CALL_INCOMING,
            self::CALL_MISSED,
            self::CALL_ENDED,
            self::VOICE_MESSAGE,

            // Media
            self::VIDEO_UPLOAD,
            self::VIDEO_COMMENT,
            self::BROADCAST,
            self::CHANNEL_UPDATE,

            // Jobs
            self::JOB_POSTED,
            self::JOB_APPLY,
            self::JOB_INVITE,
            self::JOB_STATUS,
            self::CONNECTION_REQUEST,
            self::CONNECTION_ACCEPT,
            self::RECOMMENDATION,
            self::ENDORSEMENT,

            // Payments
            self::PAYMENT_SUCCESS,
            self::PAYMENT_FAILED,
            self::PAYMENT_REFUNDED,
            self::SUBSCRIPTION_START,
            self::SUBSCRIPTION_END,
            self::SUBSCRIPTION_RENEW,
            self::ORDER_PLACED,
            self::ORDER_SHIPPED,
            self::ORDER_DELIVERED,
            self::ORDER_CANCELLED,

            // System
            self::SYSTEM_ALERT,
            self::POLICY_UPDATE,
            self::SECURITY_ALERT,
            self::ACCOUNT_VERIFIED,
            self::ACCOUNT_WARNING,
            self::ACCOUNT_DEACTIVATED,
            self::ACCOUNT_DELETED,

            // Gamification
            self::BADGE_AWARDED,
            self::LEVEL_UP,
            self::STREAK_REMINDER,
            self::ACHIEVEMENT_UNLOCKED,
            self::LEADERBOARD_UPDATE
        ];
    }
}
