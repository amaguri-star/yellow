<template>
    <transition name="modal" appear>
        <div
            class="
                flex
                justify-center
                align-center
                fixed
                absolute
                top-0
                left-0
                w-full
                h-screen
                bg-black bg-opacity-50
                z-30
            "
            @click.self="$emit('close')"
        >
            <div class="bg-white p-6 rounded">
                <div class="modal-content">
                    <slot name="content"></slot>
                </div>
                <footer class="modal-footer">
                    <slot name="footer"></slot>
                </footer>
            </div>
        </div>
    </transition>
</template>